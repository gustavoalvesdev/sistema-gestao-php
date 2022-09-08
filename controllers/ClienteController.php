<?php 

namespace Controllers;

use Core\Controller;
use Models\User;

class ClienteController extends Controller 
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

        /*$s = '';

        if (! empty($_GET['busca'])) {

            $s = trim($_GET['busca']);

        } */

        //$data['list'] = $p->getProducts($s);

        $this->loadView('cliente-add', $data);
    }


    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
