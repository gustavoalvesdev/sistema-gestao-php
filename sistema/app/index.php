<?php

session_start();

use App\Core\Core;

require '../vendor/autoload.php';

$core = new Core();

$core->run();
