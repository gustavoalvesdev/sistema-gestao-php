<?php 

namespace Core;

class Core {
    public function run() 
    {
        $url = \substr($_SERVER['REQUEST_URI'], 1);
        $url = \explode('/', $url);

        $url = substr($_SERVER['REQUEST_URI'], 1);
        $url = explode('/', $url);

        $controller = isset($url[0]) && $url[0] ? $url[0]: 'home';
        $action = isset($url[1]) && $url[1] ? $url[1]: 'index';
        $param = isset($url[2]) && $url[2] ? $url[2] : null;

        if (! \class_exists($controller = "Controllers\\" . \ucfirst($controller) . 'Controller')) {
            die('Página não encontrada');
        }

        if (! \method_exists($controller, $action)) {
            $action = 'index';
            $param = isset($url[1]) ? $url[1] : null;
        }

        $response = \call_user_func_array([new $controller, $action], [$param]);

        echo $response;
    }
}
