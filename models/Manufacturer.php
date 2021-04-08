<?php 

class Manufacturer extends Model
{

    public function getManufacturers($s = '') 
    {
        $array = array();

        if (! empty($s)) {

            $sql = 'SELECT * FROM manufacturers WHERE name LIKE :s OR url LIKE :s';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':s', '%'.$s.'%');

            $sql->execute();

        } else {
            $sql = 'SELECT * FROM manufacturers';
            $sql = $this->db->query($sql);
        }

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;


    }

    public function addManufacturer($name, $url)
    {
        $sql = 'INSERT INTO manufacturers (name, url) VALUES (:name, :url)';

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':url', $url);

        $sql->execute();

        return true;

    }
}
