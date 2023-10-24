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
