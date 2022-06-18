<?php 

class LoginController extends Controller 
{
    public function index()
    {
        
        $data = array(
            'msg'=> ''
        );

        if (!empty($_POST['number'])) {
            $unumber = $_POST['number'];
            $upass = $_POST['password'];

            $user = new User();

            if ($user->verifyUser($unumber, $upass)) {

                $token = $user->createToken($unumber);
                $_SESSION['token'] = $token;

                header('Location: '.BASE_URL);
                exit;

            } else {

                $data['msg'] = 'Número e/ou senha errados!';
                
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
