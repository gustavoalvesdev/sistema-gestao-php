<?php 

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

define('BASE_URL', 'http://localhost/sistema-gestao-php/');
