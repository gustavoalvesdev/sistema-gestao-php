<?php 

session_start();

require_once 'config.php';

require  'autoload.php';

$core = new Core();

$core->run();
