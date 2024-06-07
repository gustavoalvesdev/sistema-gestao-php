<?php 

namespace Models;
use Core\Model;
use Database\Database;

class Usuario
{

    private \PDO $db;

    public $id;
    public $numero;
    public $email;
    public $senha;
    public $token;
    public $company_id;
    public $info;

}
