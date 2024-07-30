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

            $this->usuario = new Usuario();
            $this->usuarioDao = new UsuarioDAO();
            $this->usuarioDao->obterConexao(new BancoDeDadosMySQL);
            $this->usuario->email = $email;
            $this->usuario->senha = $senha;

            if ($this->usuarioDao->verificarUsuario($this->usuario)) {


                $token = $this->usuarioDao->criarToken($this->usuario);
                
                $idDaEmpresa = $this->usuarioDao->obterInformacoesDoUsuario($this->usuario)['company_id'];
                
                
                $_SESSION['token'] = $token;
                $_SESSION['id_da_empresa'] = $idDaEmpresa;

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
