<?php 

session_start();

require_once 'config.php';

spl_autoload_register(function($className) {

    $filename = $className.'.php';

    if (file_exists('controllers/'.$filename)) {
        require_once 'controllers/'.$filename;
    } else if (file_exists('models/'.$filename)) {
        require_once 'models/'.$filename;
    } else if (file_exists('core/'.$filename)) {
        require_once 'core/'.$filename;
    }

});

$core = new Core();

$core->run();
