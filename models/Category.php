<?php 

namespace Models;

use Core\Model;

class Category extends Model 
{   

    private $id;
    private $name;
    private $companyId;

    /* GETTERS AND SETTERS */

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCompanyId()
    {
        return $this->companyId;
    }

    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /* DB METHODS */
    public function getCategories($s = '') 
    {
        $array = [];

        if (! empty($s)) {
            $sql = 'SELECT * FROM categories WHERE name LIKE :name';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':name', '%'.$s.'%');

            $sql->execute();

        } else {
            $sql = 'SELECT * FROM categories';
            $sql = $this->db->query($sql);
        }

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }

    public function getCategoryName($id)
    {
        $categoryName = '';
        $sql = 'SELECT name FROM categories WHERE id = :id';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $categoryName = $sql->fetch()[0];
        }

        return $categoryName;
    }

    public function addCategory($name)
    {
        $sql = 'INSERT INTO categories (name) VALUES (:name)';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name', $name);

        $sql->execute();

        return true;
    }

    public function deleteCategory($id)
    {
        $sql = 'DELETE FROM categories WHERE id = :id';

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }
}
