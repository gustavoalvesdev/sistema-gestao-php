<?php 

namespace Models;

use Core\Model;
use Database\Database;

class Provider extends Model
{

    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getProviders($s = '') 
    {
        $array = array();

        if (! empty($s)) {

            $sql = 'SELECT * FROM providers WHERE name LIKE :s OR url LIKE :s';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':s', '%'.$s.'%');

            $sql->execute();

        } else {
            $sql = 'SELECT * FROM providers';
            $sql = $this->db->query($sql);
        }

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;


    }

    public function addProvider($name, $url)
    {
        $sql = 'INSERT INTO providers (name, url) VALUES (:name, :url)';

        $sql = $this->db->prepare($sql);
        
        $sql->bindValue(':name', $name);
        $sql->bindValue(':url' , $url );

        $sql->execute();

        return true;

    }

    public function editProvider($name, $url, $provider_id)
    {
        $sql = "UPDATE providers SET name = :name, url = :url WHERE id = :provider_id";

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name', $name);
        $sql->bindValue(':url', $url);
        $sql->bindValue(':provider_id', $provider_id);

        return $sql->execute();
    }

    public function getProvider($id)
    {
        $data = array();

        $sql = "SELECT * FROM providers WHERE id = :id";

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
        }


        return $data;
    }
}
