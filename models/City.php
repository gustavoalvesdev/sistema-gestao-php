<?php 

namespace Models;
use Core\Model;
use Database\Database;

class City extends Model 
{

    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getCities($s = '')
    {

        $array = array();

        if (! empty($s)) {

            $sql = 'SELECT * FROM cities WHERE name LIKE :name';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':name', '%'.$s.'%');

            $sql->execute();

        } else {
            $sql = 'SELECT * FROM cities';
            $sql = $this->db->query($sql);
        }


        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }

    public function addCity($name, $state)
    {
        $sql = 'INSERT INTO cities (name, state) VALUES(:name, :state)';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name', $name);
        $sql->bindvalue(':state', $state);

        $sql->execute();

        return true;

    }

}