<?php

class HomeController extends Controller {

    private $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();

        if (! $this->user->checkLogin()) {
            header('Location: '.BASE_URL.'login');
            exit;
        }
        
        $data = array();

        /*$data['menu'] = array(
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
                'text' => 'Produtos'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'categoria',
                'text' => 'Categorias'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'cidade',
                'text' => 'Cidades'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'fabricante',
                'text' => 'Fabricantes'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'fabricante',
                'text' => 'Pessoas'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'fabricante',
                'text' => 'Vendas'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'fabricante',
                'text' => 'Contas'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'relatorio',
                'text' => 'Relatórios'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'relatorio',
                'text' => 'Dashboards'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'login/sair',
                'text' => 'Sair'
            )
        );*/

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

    public function index() {

        $data = array();

        $p = new Product();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = trim($_GET['busca']);

        }

        $data['list'] = $p->getProducts($s);

        $this->loadView('home', $data);
    }

    public function add()
    {
        $data = array();

        $p = new Product();

        if (! empty($_POST['cod'])) {

            $cod         = $_POST['cod'];
            $name        = $_POST['name'];
            $price       = $_POST['price'];
            $quantity    = $_POST['quantity'];
            $minQuantity = $_POST['min_quantity'];

            $p->addProduct($cod, $name, $price, $quantity, $minQuantity);

            header('Location: '.BASE_URL);
            exit;
        }

        $this->loadView('add', $data);
    }

    public function edit($id)
    {
        $data = array('info' => '');

        $p = new Product();

        if (! empty($_POST['cod'])) {

            $cod         = $_POST['cod'];
            $name        = $_POST['name'];
            $price       = $_POST['price'];
            $quantity    = $_POST['quantity'];
            $minQuantity = $_POST['min_quantity'];

            $p->editProduct($cod, $name, $price, $quantity, $minQuantity, $id);
            header('Location: '.BASE_URL);
        }

        $data['info'] = $p->getProduct($id);

        $this->loadView('edit', $data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
