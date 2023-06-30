<?php 

namespace Models;
use Core\Model;

class Product extends Model
{

    public function getProducts($s = '')
    {
        $array = array();

        if (! empty($s)) {

            $sql = 'SELECT * FROM products WHERE cod = :cod OR name LIKE :name AND soft_delete = 0';

            $sql = $this->db->prepare($sql);

            $sql->bindValue(':cod' ,     $s    );
            $sql->bindValue(':name', '%'.$s.'%');

            $sql->execute();

        } else {
            $sql = 'SELECT * FROM products WHERE soft_delete = 0';
            $sql = $this->db->query($sql);
        }


        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function addProduct(
        $cod, 
        $name, 
        $price, 
        $quantity, 
        $minQuantity, 
        $categoryId, 
        $subcategoryId
    )
    {
        $sql = 'INSERT INTO products (cod, name, price, quantity, min_quantity, category_id, subcategory_id) VALUES (:cod, :name, :price, :quantity, :min_quantity, :category_id, :subcategory_id)';

        $sql = $this->db->prepare($sql);

        $price = str_replace('.', '' , $price);
        $price = str_replace(',', '.', $price);

        $sql->bindValue(':cod'           , $cod          );
        $sql->bindValue(':name'          , $name         );
        $sql->bindValue(':price'         , $price        );
        $sql->bindValue(':quantity'      , $quantity     );
        $sql->bindValue(':min_quantity'  , $minQuantity  );
        $sql->bindValue(':category_id'   , $categoryId   );
        $sql->bindValue(':subcategory_id', $subcategoryId);

        $sql->execute();

        return true;
    }

    public function getProduct($id)
    {
        $array = array();
        $sql = 'SELECT * FROM products WHERE id = :id';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function editProduct(
        $cod, 
        $name, 
        $price, 
        $quantity, 
        $minQuantity, 
        $categoryId,
        $subcategoryId,
        $id
    )
    {
        $sql = 'UPDATE products SET cod = :cod, name = :name, price = :price, quantity = :quantity, min_quantity = :min_quantity, category_id = :category_id, subcategory_id = :subcategory_id WHERE id = :id';

        $sql = $this->db->prepare($sql);

        $price = str_replace('.', '' , $price);
        $price = str_replace(',', '.', $price);
        $quantity = str_replace('.', '' , $quantity);
        $quantity = str_replace(',', '.', $quantity);
        $minQuantity = str_replace('.', '' , $minQuantity);
        $minQuantity = str_replace(',', '.', $minQuantity);

        $sql->bindValue(':cod'           , $cod          );
        $sql->bindValue(':name'          , $name         );
        $sql->bindValue(':price'         , $price        );
        $sql->bindValue(':quantity'      , $quantity     );
        $sql->bindValue(':min_quantity'  , $minQuantity  );
        $sql->bindValue(':category_id'   , $categoryId   );
        $sql->bindValue(':subcategory_id', $subcategoryId);
        $sql->bindValue(':id'            , $id           );

        $sql->execute();
    }

    public function getLowQuantityProducts()
    {
        $array = array();

        $sql = 'SELECT * FROM products WHERE quantity < min_quantity';
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function deleteProduct($id)
    {
        if (isset($id) && !empty($id)) {
            $sql = 'UPDATE products SET soft_delete = 1 WHERE id = :id';
        }

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

}
