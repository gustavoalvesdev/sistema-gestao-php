<?php 

class Subcategory extends Model 
{
    public function addSubcategory($name, $categoryId)
    {
        $sql = 'INSERT INTO subcategories (name, category_id) VALUES (:name, :category_id)';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name', $name);
        $sql->bindValue(':category_id', $categoryId);

        $sql->execute();

        return true;
    }
}
