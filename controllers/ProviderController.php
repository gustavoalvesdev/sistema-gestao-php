<?php 

namespace Controllers;
use Core\Controller;
use Models\User;
use Models\Provider;

class ProviderController extends Controller 
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

        $m = new Provider();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        }

        $data['list'] = $m->getProviders($s);

        $this->loadView('provider-list', $data);
    }

    public function add()
    {
        $data = array();

        $m = new Provider();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        }

        if (! empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $url  = addslashes($_POST['url']);

            $m->addProvider($name, $url);

            header('Location: '.BASE_URL.'provider');

            exit;

        }

        $data['list'] = $m->getProviders($s);

        $this->loadView('provider-add', $data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
