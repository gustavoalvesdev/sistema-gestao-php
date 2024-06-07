<?php 

namespace Controllers;

use BancoDeDados\BancoDeDadosMySQL;
use Core\Controller;
use DAO\UsuarioDAO;
use Models\Usuario;

class LoginController extends Controller 
{
    public function index()
    {
        
        $this->dados['mensagem'] = '';

        if (!empty($_POST['email'])) {
            
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $usuario = new Usuario();
            $usuarioDao = new UsuarioDAO();
            $usuarioDao->obterConexao(new BancoDeDadosMySQL);
            $usuario->email = $email;
            $usuario->senha = $senha;

            if ($usuarioDao->verificarUsuario($usuario)) {

                $token = $usuarioDao->criarToken($usuario);
                $_SESSION['token'] = $token;

                header('Location: '.BASE_URL);
                exit;

            } else {

                $this->dados['mensagem'] = 'E-mail e/ou senha errados!';
                
            }

        }

        $this->loadView('login', $this->dados);

    }

    public function sair()
    {
        unset($_SESSION['token']);
        header('Location: '.BASE_URL.'login');
    }
}
