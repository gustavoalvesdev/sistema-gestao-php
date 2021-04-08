<?php 

class Model {

    protected $dv;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

}
