<?php 

namespace Models;
use Core\Model;

class Customer extends Model
{
    private $id;
    private $name;
    private $cpf;
    private $phone;
    private $cellphone;
    private $zipCode;
    private $street;
    private $number;
    private $district;
    private $city;
    private $state;
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

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getCellphone()
    {
        return $this->cellphone;
    }

    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function getZipCode()
    {
        return $this->zipcode;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getCompanyId()
    {
        return $this->companyId;
    }

    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /* GETTERS AND SETTERS */
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
            $sql = 'SELECT * FROM customers WHERE soft_delete = 0';
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

    public function deleteCustomer($id)
    {
        if (isset($id) && !empty($id)) {
            $sql = 'UPDATE customers SET soft_delete = 1 WHERE id = :id';
        }

        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

}
