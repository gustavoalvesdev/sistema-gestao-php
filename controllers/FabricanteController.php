<?php 

class FabricanteController extends Controller 
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

        $m = new Manufacturer();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        }

        $data['list'] = $m->getManufacturers($s);

        $this->loadView('fabricante', $data);
    }

    public function add()
    {
        $data = array();

        $m = new Manufacturer();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        }

        if (! empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $url  = addslashes($_POST['url']);

            $m->addManufacturer($name, $url);

            header('Location: '.BASE_URL.'fabricante');

            exit;

        }

        $data['list'] = $m->getManufacturers($s);

        $this->loadView('fabricante-add', $data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
