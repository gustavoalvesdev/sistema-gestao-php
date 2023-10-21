<?php 

namespace Models;
use Core\Model;
use Database\Database;

class State
{

    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getStates()
    {
        $array = [];

        $sql = 'SELECT * FROM states';
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}
