<?php 

namespace Controllers;

use Core\Controller;
use DAO\CategoryDAO;
use DAO\ProductDAO;
use Database\MySQLDatabase;
use Models\User;
use Models\Category;

class CategoriaController extends Controller 
{

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();

        if (! $this->user->checkLogin()) {
            header('Location: '.BASE_URL.'login');
            exit;
        }
        
        $data = array();
        
        $data['menu'] = array(
            array(
                'class' => 'link-home',
                'id' => '',
                'link' => BASE_URL,
                'text' => 'Início'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'produto',
                'text' => 'Configurações'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'categoria',
                'text' => 'Usuários'
            )
        );

        $this->loadView('template_parts/header', $data);
    }

    public function index()
    {
        $data = array();

        $c = new CategoryDAO();
        $c->getConnection(new MySQLDatabase);

        $s = '';

        if (! empty($_GET['busca'])) {
            $s = trim($_GET['busca']);
            $data['categories'] = $c->all("name LIKE '%{$s}%' AND soft_delete = 0");
        } else {
            $data['categories'] = $c->all("soft_delete = 0");
        }


        $this->loadView('categoria', $data);
    }

    public function add()
    {
        $data = array();

        $category = new Category();

        if (! empty($_POST['name'])) {
            $name = mb_strtoupper(addslashes($_POST['name']));
            
            $category->name = $name;

            $dao = new CategoryDAO;
            $dao->getConnection(new MySQLDatabase);

            $dao->save($category);

            header('Location: ' . BASE_URL . 'categoria');

        }

        $this->loadView('categoria-add', $data);

    }

    public function edit(int $id)
    {
        $categoriaDao = new CategoryDAO();
        $categoriaDao->getConnection(new MySQLDatabase);

        $categoria = $categoriaDao->find($id);

        $this->data['category'] = $categoria;

        if (isset($_POST['name'])) {

            $category = new Category;
            $category->name = addslashes($_POST['name']);
            $category->id = $id;

            $categoriaDao->save($category);

            header('Location: ' . BASE_URL . 'categoria');
            
        }

        $this->loadView('categoria-edit', $this->data);

    }

    public function delete($id)
    {
        $c = new CategoryDAO();
        $c->getConnection(new MySQLDatabase);

        if (! empty($id)) {
            


            $product = new ProductDAO;
            $product->getConnection(new MySQLDatabase);

            $product = $product->all('category_id = ' . $id);

            if (count($product) > 0) {
                header("Location: " . BASE_URL . 'categoria?items_associated=true');
                exit;
            } else {
                $c->delete($id);
            }

        }

        header('Location: '.BASE_URL.'categoria');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
