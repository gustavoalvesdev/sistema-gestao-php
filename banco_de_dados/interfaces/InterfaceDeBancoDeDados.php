<?php 

declare(strict_types=1);

namespace BancoDeDados\Interfaces;

use PDO;

interface InterfaceDeBancoDeDados
{
    public static function obterInstancia(): PDO;
}
