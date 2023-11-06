<?php 

namespace Controllers;

use Core\Controller;
use DAO\CategoryDAO;
use Database\MySQLDatabase;
use Models\User;
use Models\Category;

class CategoriaController extends Controller 
{

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();

        if (! $this->user->checkLogin()) {
            header('Location: '.BASE_URL.'login');
            exit;
        }
        
        $data = array();
        
        $data['menu'] = array(
            array(
                'class' => 'link-home',
                'id' => '',
                'link' => BASE_URL,
                'text' => 'Início'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'produto',
                'text' => 'Configurações'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'categoria',
                'text' => 'Usuários'
            )
        );

        $this->loadView('template_parts/header', $data);
    }

    public function index()
    {
        $data = array();

        $c = new CategoryDAO();
        $c->getConnection(new MySQLDatabase);

        $s = '';

        if (! empty($_GET['busca'])) {
            $s = trim($_GET['busca']);
            $data['categories'] = $c->all("name LIKE '%{$s}%' AND soft_delete = 0");
        } else {
            $data['categories'] = $c->all("soft_delete = 0");
        }


        $this->loadView('categoria', $data);
    }

    public function add()
    {
        $data = array();

        $c = new Category();

        if (! empty($_POST['name'])) {
            $name = mb_strtoupper(addslashes($_POST['name']));
            $c->addCategory($name);
        }

        $this->loadView('categoria-add', $data);

    }

    public function edit(int $id)
    {
        $categoriaDao = new CategoryDAO();
        $categoriaDao->getConnection(new MySQLDatabase);

        $categoria = $categoriaDao->find($id);

        $this->data['category'] = $categoria;

        $this->loadView('categoria-edit', $this->data);

    }

    public function delete($id)
    {
        $c = new CategoryDAO();
        $c->getConnection(new MySQLDatabase);

        if (! empty($id)) {
            $c->delete($id);
        }

        header('Location: '.BASE_URL.'categoria');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
