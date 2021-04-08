<?php 

class State extends Model 
{

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
