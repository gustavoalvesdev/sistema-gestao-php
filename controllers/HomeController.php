<?php

namespace Controllers;
use Core\Controller;
use Models\User;
use Models\Product;

class HomeController extends Controller 
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
        $this->loadView('home', $this->data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
