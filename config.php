<?php 

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

define('BASE_URL', 'http://localhost/sistema-gestao-php/');

// $db_config = array();

// if (ENVIRONMENT === 'development') {
//     define('BASE_URL', 'http://localhost/sistema-gestao-php/');
//     $db_config['dbname'] = 'estoque';
//     $db_config['host'] = 'localhost';
//     $db_config['dbuser'] = 'root';
//     $db_config['dbpass'] = '';
// } else if (ENVIRONMENT === 'production') {
//     define('BASE_URL', 'http://localhost/sistema-gestao-php/');
//     $db_config['dbname'] = 'estoque';
//     $db_config['host'] = 'localhost';
//     $db_config['dbuser'] = 'root';
//     $db_config['dbpass'] = '';
// }

global $db;

try {

    $db = new PDO('mysql:host='. $_SERVER['DB_HOST'] .';dbname='. $_SERVER['DB_NAME'] , $_SERVER['DB_USER'], $_SERVER['DB_PASS']); 

} catch(PDOException $e) {
    echo 'ERRO: ' . $e->getMessage();
    exit;
}
