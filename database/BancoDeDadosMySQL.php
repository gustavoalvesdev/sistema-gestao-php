<?php 

declare(strict_types=1);

namespace Database;

use Database\Interfaces\DatabaseInterface;

final class BancoDeDadosMySQL implements DatabaseInterface
{

    private static ?\PDO $instance = null;

    public static function getInstance(): \PDO
    {
        if (self::$instance == null) {
            self::$instance = new \PDO('mysql:host='.$_SERVER['DB_HOST'].';dbname=' . $_SERVER['DB_NAME'], $_SERVER['DB_USER'], $_SERVER['DB_PASS']);
        }

        return self::$instance;
    }

}
