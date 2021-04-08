<?php 

require_once 'environment.php';

$db_config = array();

if (ENVIRONMENT === 'development') {
    define('BASE_URL', 'http://localhost/estoque/');
    $db_config['dbname'] = 'estoque';
    $db_config['host'] = 'localhost';
    $db_config['dbuser'] = 'root';
    $db_config['dbpass'] = '';
} else if (ENVIRONMENT === 'production') {
    define('BASE_URL', 'http://localhost/estoque/');
    $db_config['dbname'] = 'estoque';
    $db_config['host'] = 'localhost';
    $db_config['dbuser'] = 'root';
    $db_config['dbpass'] = '';
}

global $db;

try {

    $db = new PDO('mysql:host='.$db_config['host'].';dbname='.$db_config['dbname'], $db_config['dbuser'], $db_config['dbpass']);

} catch(PDOException $e) {
    echo 'ERRO: ' . $e->getMessage();
    exit;
}
