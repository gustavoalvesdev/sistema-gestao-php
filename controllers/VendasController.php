<?php 

namespace Controllers;

use BancoDeDados\BancoDeDadosMySQL;
use Core\Controller;
use DAO\UsuarioDAO;

class VendasController extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        $usuario_dao = new UsuarioDAO();
        $usuario_dao::obter_conexao(new BancoDeDadosMySQL);

        if (! $usuario_dao->verificarLogin($this->usuario)) {
            header('Location: '.$_SERVER['BASE_URL'].'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->dados);
    }

    public function index()
    {
       echo 'VENDENDO!';
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
