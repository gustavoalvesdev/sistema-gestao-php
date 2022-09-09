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

        $this->loadView('template_parts/header', $this->data);
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
