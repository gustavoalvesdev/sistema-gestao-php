<?php 

namespace Core;

class Controller 
{

    protected $data;

    public function __construct()
    {
        $this->data['menu'] = array(
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
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL . 'login/sair',
                'text' => 'Sair'
            )
        );
    }

    public function loadView($viewName, $viewData = array()) 
    {
        extract($viewData);

        require 'views/'.$viewName.'.php';
    } 

    public function actionNotFound() 
    {
        $this->loadView('not-found');
    }
}
