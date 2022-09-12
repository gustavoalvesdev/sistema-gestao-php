<?php 

namespace Models;

use Core\Model;

class Provider extends Model
{

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
}