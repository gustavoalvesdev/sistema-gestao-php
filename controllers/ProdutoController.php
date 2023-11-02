<?php

namespace Controllers;
use Core\Controller;
use DAO\ProductDAO;
use Database\Database;
use Models\User;
use Models\Product;
use Models\Category;
use Models\Subcategory;
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

        $p->getConnection(Database::getInstance());

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = trim($_GET['busca']);
            $this->data['list'] = $p->all("name LIKE '%$s%' OR cod LIKE '%$s%'");
        } else {
            $this->data['list'] = $p->all();
        }

        

        $this->loadView('produto', $this->data);
    }

    public function add()
    {

        $product = new Product();

        $c = new Category();

        $s = '';

        $this->data['list'] = $c->getCategories($s);

        if (! empty($_POST['cod'])) {

            $product->cod           = $_POST['cod'           ];
            $product->name          = $_POST['name'          ];
            $price = str_replace('.', '' , $_POST['price']);
            $price = str_replace(',', '.', $price);
            $product->price         = floatval($price);
            $product->quantity      = intval($_POST['quantity']);
            $product->minQuantity   = intval($_POST['min_quantity']);
            $product->categoryId    = intval($_POST['category_id'   ]);
            $product->subCategoryId = intval($_POST['subcategory_id']);
            $product->companyId = 1;
            $product->softDelete = 1;

            $dao = new ProductDAO;
            $dao->getConnection($this->conn);

            $dao->save($product);

            header('Location: '.BASE_URL.'produto');
            exit;
        }

        $this->loadView('produto-add', $this->data);
    }

    public function edit($id)
    {
        $this->data = array('info' => '');

        $product = new Product();

        $dao = new ProductDAO;
        $dao->getConnection($this->conn);

        if (! empty($_POST['cod'])) {

            $product = new Product;

            $product->cod         = addslashes($_POST['cod'           ]);
            $product->name        = addslashes($_POST['name'          ]);
            $price = str_replace('.', '' , $_POST['price']);
            $price = str_replace(',', '.', $price);
            $product->price         = floatval($price);
            $product->quantity    = intval(addslashes($_POST['quantity'      ]));
            $product->minQuantity = intval(addslashes($_POST['min_quantity'  ]));
            $product->categoryId    = intval(addslashes($_POST['category_id'   ]));
            $product->subCategoryId = intval(addslashes($_POST['subcategory_id']));
            $product->id = $id;

            

            $dao->save($product);

            header('Location: '.BASE_URL.'produto');
        }

        $product = $dao->all("id = $id")[0];

        $c = new Category();
        $category = $c->getCategoryName($product->categoryId);

        $sub = new Subcategory();
        $subcategories = $sub->getSubcategories($product->categoryId);

        $this->data['subcategories'] = $subcategories;
        $this->data['product'] = $product;
        
        $this->loadView('produto-edit', $this->data);
    }

    public function delete($id)
    {
        
        $p = new Product();

        if (! empty($id)) {

            $name = addslashes($id);
            $p->deleteProduct($id);
        }

        header('Location: '.BASE_URL.'produto');
        exit;
        
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
