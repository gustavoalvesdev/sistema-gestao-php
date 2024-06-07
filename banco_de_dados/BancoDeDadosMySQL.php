<?php 

declare(strict_types=1);

namespace BancoDeDados;

use BancoDeDados\Interfaces\InterfaceDeBancoDeDados;
use PDO;

final class BancoDeDadosMySQL implements InterfaceDeBancoDeDados
{

    private static ?\PDO $instanciaDoMySQL = null;

    public static function obterInstancia(): PDO
    {
        if (self::$instanciaDoMySQL == null) {
            self::$instanciaDoMySQL = new \PDO('mysql:host='.$_SERVER['DB_HOST'].';dbname=' . $_SERVER['DB_NAME'], $_SERVER['DB_USER'], $_SERVER['DB_PASS']);
        }

        return self::$instanciaDoMySQL;
    }

}
