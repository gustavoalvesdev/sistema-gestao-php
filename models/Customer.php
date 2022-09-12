<?php 

namespace Models;
use Core\Model;

class Customer extends Model
{

    public function getCustomers($s = '')
    {
        $array = array();

        if (! empty($s)) {

            $sql = 'SELECT * FROM customers WHERE cpf LIKE :cpf OR name LIKE :name';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':cpf',  "%" .$s . "%");
            $sql->bindValue(':name', '%'.$s.'%');

            $sql->execute();

        } else {
            $sql = 'SELECT * FROM customers';
            $sql = $this->db->query($sql);
        }


        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function addCustomer(
        $name, 
        $cpf, 
        $phone, 
        $cellphone, 
        $zipcode, 
        $street, 
        $number, 
        $district, 
        $city, 
        $state
    )
    {
        $sql = 'INSERT INTO customers (name, cpf, phone, cellphone, zipcode, street, number, district, city, state) VALUES (:name, :cpf, :phone, :cellphone, :zipcode, :street, :number, :district, :city, :state)';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name'      , $name     );
        $sql->bindValue(':cpf'       , $cpf      );
        $sql->bindValue(':phone'     , $phone    );
        $sql->bindValue(':cellphone' , $cellphone);
        $sql->bindValue(':zipcode'   , $zipcode  );
        $sql->bindValue(':street'    , $street   );
        $sql->bindValue(':number'    , $number   );
        $sql->bindValue(':district'  , $district );
        $sql->bindValue(':city'      , $city     );
        $sql->bindValue(':state'     , $state    );

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
        $id
    )
    {
        $sql = 'UPDATE products SET cod = :cod, name = :name, price = :price, quantity = :quantity, min_quantity = :min_quantity WHERE id = :id';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':cod'         , $cod        );
        $sql->bindValue(':name'        , $name       );
        $sql->bindValue(':price'       , $price      );
        $sql->bindValue(':quantity'    , $quantity   );
        $sql->bindValue(':min_quantity', $minQuantity);
        $sql->bindValue(':id'          , $id         );

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

}
