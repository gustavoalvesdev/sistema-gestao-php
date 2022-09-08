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

        $p = new Product();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = trim($_GET['busca']);

        }

        $data['list'] = $p->getProducts($s);

        $this->loadView('produto', $data);
    }

    public function add()
    {
        $data = array();

        $p = new Product();

        $c = new Category();

        $s = '';

        $data['list'] = $c->getCategories($s);

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

        $this->loadView('produto-add', $data);
    }

    public function edit($id)
    {
        $data = array('info' => '');

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

        $data['info'] = $p->getProduct($id);

        $this->loadView('produto-edit', $data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
