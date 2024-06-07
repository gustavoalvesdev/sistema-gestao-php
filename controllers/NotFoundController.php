<?php 

namespace Controllers;
use Core\Controller;

class NotFoundController extends Controller 
{

    public function index() 
    {
        $this->loadView('pagina-nao-encontrada');
    }

}
