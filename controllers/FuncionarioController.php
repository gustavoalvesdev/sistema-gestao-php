<?php 

namespace Controllers;

use Core\Controller;
use DAO\FuncionarioDAO;
use Database\Database;
use Models\User;
use Models\Customer;
use Models\Funcionario;

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

        if (! empty($_POST['name'])) {

            $f = new Funcionario();

            $f->setNome(addslashes($_POST['name']));
            $f->setRg(addslashes($_POST['rg']));
            $f->setCpf(addslashes($_POST['cpf']));
            $f->setEmail(addslashes($_POST['email']));
            $f->setCelular(addslashes($_POST['cellphone']));
            $f->setTelefone(addslashes($_POST['phone']));
            $f->setSenha(addslashes($_POST['password']));
            $f->setCargo(addslashes($_POST['role']));
            $f->setNivelAcesso(addslashes(intval($_POST['access_level'])));
            $f->setCep(addslashes($_POST['zipcode']));
            $f->setEndereco(addslashes($_POST['street']));
            $f->setNumero(addslashes($_POST['number']));
            $f->setBairro(addslashes($_POST['district']));
            $f->setCidade(addslashes($_POST['city']));
            $f->setComplemento(addslashes($_POST['complement']));
            $f->setEstado(addslashes($_POST['state']));

            $fd = new FuncionarioDAO(Database::getInstance());

            $fd->add($f);

            header('Location: '.BASE_URL.'funcionario');
            exit;
        }

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
