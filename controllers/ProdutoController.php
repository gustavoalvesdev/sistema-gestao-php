<?php

namespace Controllers;
use Core\Controller;
use DAO\ProductDAO;
use DAO\ProviderDAO;
use Database\Database;
use Database\MySQLDatabase;
use Models\User;
use Models\Product;
use Models\Provider;
use PDO;

class ProdutoController extends Controller 
{

    private PDO $conn;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();

        $this->conn = Database::getInstance();

        if (! $this->user->checkLogin()) 
        {
            header('Location: '.BASE_URL.'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->data);
    }

    public function index() 
    {

        $p = new ProductDAO();

        $p->getConnection(new MySQLDatabase);

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = trim(addslashes($_GET['busca']));
            $this->data['list'] = $p->all("soft_delete = 0 AND name LIKE '%$s%' OR cod LIKE '%$s%'");
        } else {
            $this->data['list'] = $p->all("soft_delete = 0");
        }

        

        $this->loadView('produto', $this->data);
    }

    public function add()
    {

        $providerDao = new ProviderDAO();
        $providerDao->getConnection(new MySQLDatabase);

        $this->data['providers'] = $providerDao->all();

        if (! empty($_POST['cod'])) {

            $product = new Product();

            $product->cod = $_POST['cod'];
            $product->name = $_POST['name'];
            $price = str_replace('.', '' , $_POST['price']);
            $price = str_replace(',', '.', $price);
            $product->price = floatval($price);
            $quantity = str_replace('.', '', $_POST['quantity']);
            $quantity = str_replace(',', '.', $quantity);
            $product->quantity = floatval($quantity);
            $min_quantity = str_replace('.', '', $_POST['min_quantity']);
            $min_quantity = str_replace(',', '.', $min_quantity);
            $product->min_quantity = floatval($min_quantity);
            $product->company_id = 1;
            $product->soft_delete = 0;
            $product->provider_id = $_POST['provider_id'];

            $dao = new ProductDAO;
            $dao->getConnection(new MySQLDatabase);

            $dao->save($product);

            header('Location: '.BASE_URL.'produto');
            exit;
        }

        $this->loadView('produto-add', $this->data);
    }

    public function edit($id)
    {    
        $productDao = new ProductDAO();

        $productDao->getConnection(new MySQLDatabase);

        $product = $productDao->find($id);

        $providerDao = new ProviderDAO();
        $providerDao->getConnection(new MySQLDatabase);

        $this->data['product'] = $product;
        $this->data['providers'] = $providerDao->all();

        if (isset($_POST['cod'])) {

            $productToEdit = new Product();
            $productToEdit->cod = addslashes($_POST['cod']);
            $productToEdit->name = addslashes($_POST['name']);
            $price = str_replace('.', '' , $_POST['price']);
            $price = str_replace(',', '.', $price);
            $productToEdit->price = floatval($price);
            $quantity = str_replace('.', '', $_POST['quantity']);
            $quantity = str_replace(',', '.', $quantity);
            $productToEdit->quantity      = floatval($quantity);
            $min_quantity   = str_replace('.', '', $_POST['min_quantity']);
            $min_quantity = str_replace(',', '.', $min_quantity);
            $productToEdit->min_quantity = floatval($min_quantity);
            $productToEdit->provider_id = addslashes($_POST['provider_id']);
            
            $productToEdit->company_id = $product->company_id;

            $productToEdit->id = $id;

            $productDao->save($productToEdit);

            header('Location: ' . BASE_URL . 'produto');
            exit;

        }

        
        $this->loadView('produto-edit', $this->data);
    }

    public function delete($id)
    {
        
        $productDao = new ProductDAO();
        $productDao->getConnection(new MySQLDatabase);

        if (! empty($id)) {

            $productDao->delete($id);
        }

        header('Location: '.BASE_URL.'produto');
        exit;
        
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
