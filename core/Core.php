<?php 

namespace Core;

class Core {
    public function run() 
    {
        
        $url = '/';

        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }
        
        $params = array();

        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            $currentController =  'Controllers\\' .  ucfirst($url[0]).'Controller';

            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }

        } else {
            $currentController = 'Controllers\HomeController';
            $currentAction = 'index';
        }

        $fileName = explode('\\', $currentController);

        if (! file_exists('controllers/'.$fileName[1].'.php')) {
            $currentController = 'Controllers\NotFoundController';
        }

        $c = new $currentController();

        if (! method_exists($c, $currentAction)) {
            $currentAction = 'actionNotFound';
        }

        call_user_func_array(
            array(
                $c, 
                $currentAction
            ), 
            $params
        );
        

        
    }
}
