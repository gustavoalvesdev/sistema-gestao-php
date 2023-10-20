<?php 

namespace Models;
use Core\Model;
use Database\Database;

class Subcategory extends Model 
{

    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function addSubcategory($name, $categoryId)
    {
        $sql = 'INSERT INTO subcategories (name, category_id) VALUES (:name, :category_id)';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name'       , strtoupper($name       ));
        $sql->bindValue(':category_id',            $categoryId  );

        $sql->execute();

        return true;
    }

    public function getSubcategories($categoryId) 
    {

        $subcategories = $this->db->prepare("SELECT * FROM subcategories WHERE category_id = :category_id");
        $subcategories->bindValue(':category_id', $categoryId);
        $subcategories->execute();

        return $subcategories->fetchAll(\PDO::FETCH_ASSOC);

    }
}
