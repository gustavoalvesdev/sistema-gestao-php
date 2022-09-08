<?php

namespace Controllers;
use Core\Controller;
use Models\User;
use Models\Product;
use Models\Category;

class ProdutoController extends Controller 
{

    private $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();

        if (! $this->user->checkLogin()) 
        {
            header('Location: '.BASE_URL.'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->data);
    }

    public function index() 
    {

        $p = new Product();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = trim($_GET['busca']);

        }

        $this->data['list'] = $p->getProducts($s);

        $this->loadView('produto', $this->data);
    }

    public function add()
    {

        $p = new Product();

        $c = new Category();

        $s = '';

        $this->data['list'] = $c->getCategories($s);

        if (! empty($_POST['cod'])) {

            $cod           = $_POST['cod'           ];
            $name          = $_POST['name'          ];
            $price         = $_POST['price'         ];
            $quantity      = $_POST['quantity'      ];
            $minQuantity   = $_POST['min_quantity'  ];
            $categoryId    = $_POST['category_id'   ];
            $subcategoryId = $_POST['subcategory_id'];

            $p->addProduct(
                $cod, 
                $name, 
                $price, 
                $quantity, 
                $minQuantity, 
                $categoryId, 
                $subcategoryId
            );

            header('Location: '.BASE_URL.'produto');
            exit;
        }

        $this->loadView('produto-add', $this->data);
    }

    public function edit($id)
    {
        $this->data = array('info' => '');

        $p = new Product();

        if (! empty($_POST['cod'])) {

            $cod         = $_POST['cod'         ];
            $name        = $_POST['name'        ];
            $price       = $_POST['price'       ];
            $quantity    = $_POST['quantity'    ];
            $minQuantity = $_POST['min_quantity'];

            $p->editProduct(
                $cod, 
                $name, 
                $price, 
                $quantity, 
                $minQuantity, 
                $id
            );

            header('Location: '.BASE_URL.'produto');
        }

        $this->data['info'] = $p->getProduct($id);

        $this->loadView('produto-edit', $this->data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
