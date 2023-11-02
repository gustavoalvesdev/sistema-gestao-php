<?php 

declare(strict_types=1);

namespace Database\Interfaces;

use PDO;

interface DatabaseInterface
{
    public static function getInstance(): PDO;
}
