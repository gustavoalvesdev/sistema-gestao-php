<?php 

session_start();

require_once 'config.php';

require  'autoload.php';

use Core\Core;

$core = new Core();

$core->run();
