<?php

namespace Controllers;

use BancoDeDados\BancoDeDadosMySQL;
use Core\Controller;
use DAO\UsuarioDAO;
use Models\Usuario;

class HomeController extends Controller 
{

    public function __construct()
    {
        parent::__construct();

        $this->usuario = new Usuario();
        $this->usuarioDao = new UsuarioDAO();
        $this->usuarioDao->obter_conexao(new BancoDeDadosMySQL);

        if (! $this->usuarioDao->verificarLogin($this->usuario)) {
            header('Location: '.$_SERVER['BASE_URL'].'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->dados);
    }

    public function index() 
    {
        $this->loadView('home', $this->dados);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
