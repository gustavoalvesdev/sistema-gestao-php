<?php 

namespace Controllers;
use Core\Controller;
use Models\User;

class LoginController extends Controller 
{
    public function index()
    {
        
        $data = array(
            'msg'=> ''
        );

        if (!empty($_POST['user_email'])) {
            $email = $_POST['user_email'];
            $upass = $_POST['password'];

            $user = new User();

            if ($user->verifyUser($email, $upass)) {

                $token = $user->createToken($email);
                $_SESSION['token'] = $token;

                header('Location: '.BASE_URL);
                exit;

            } else {

                $data['msg'] = 'E-mail e/ou senha errados!';
                
            }

        }

        $this->loadView('login', $data);

    }

    public function sair()
    {
        unset($_SESSION['token']);
        header('Location: '.BASE_URL.'login');
    }
}
