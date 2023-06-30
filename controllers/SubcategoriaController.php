<?php 

namespace Controllers;
use Core\Controller;
use Models\User;
use Models\Category;
use Models\Subcategory;

class SubcategoriaController extends Controller 
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

    public function add($categoryId)
    {
        $data = array();

        $c = new Category();
        $category = $c->getCategoryName($categoryId);

        $s = new Subcategory();

        $data['categoryName'] = $category;

        if (! empty($_POST['name'])) {
            $name = mb_strtoupper(addslashes($_POST['name']));

            $s->addSubcategory($name, $categoryId);

            header('Location: '.BASE_URL.'categoria');

            exit;
        }

        $this->loadView('subcategoria-add', $data);

    }

    public function view($categoryId)
    {
        $data = array();

        $sub = new Subcategory();

        $categoryId = addslashes($categoryId);

        if (empty($categoryId)) {
            header('Location: ' . BASE_URL . 'categoria');
            exit;
        }

        $c = new Category();
        $category = $c->getCategoryName($categoryId);

        $data['list'] = $sub->getSubcategories($categoryId);
        $data['name'] = $category;

        $this->loadView('subcategoria-view', $data);
    }

}
