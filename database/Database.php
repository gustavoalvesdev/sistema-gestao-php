<?php 

declare(strict_types=1);

namespace Database;

class Database 
{

    private static ?\PDO $instance = null;

    private function __construct() { }

    public static function getInstance(): \PDO
    {
        if (self::$instance == null) {
            self::$instance = new \PDO('mysql:host='.$_SERVER['DB_HOST'].';dbname=' . $_SERVER['DB_NAME'], $_SERVER['DB_USER'], $_SERVER['DB_PASS']);
        }

        return self::$instance;
    }

}
