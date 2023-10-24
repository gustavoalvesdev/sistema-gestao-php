<?php 

namespace Controllers;

use Core\Controller;
use Models\User;
use Models\Customer;

class FuncionarioController extends Controller 
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
        $s = '';

        if (! empty($_GET['busca'])) {

            $s = trim($_GET['busca']);

        }

        //$f = new Funcionario();

        $this->data['list'] = [];

        $this->loadView('funcionario', $this->data);
    }

    public function add()
    {
        $this->loadView('funcionario-add', $this->data);
    }

    public function edit($id)
    {
  
    }

    public function delete($id)
    {

    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
