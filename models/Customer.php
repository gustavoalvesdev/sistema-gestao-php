<?php 

namespace Models;
use Database\Database;

class Customer
{

    private \PDO $db;

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
    private $category;
    private $companyId;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

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
        return $this->zipCode;
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

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category) 
    {
        $this->category = $category;
    }

    /* GETTERS AND SETTERS */
    public function getCustomers($s = '')
    {
        $array = array();

        if (! empty($s)) {

            $sql = 'SELECT * FROM customers WHERE cpf LIKE :cpf OR name LIKE :name AND soft_delete = 0';
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
        $rg,
        $cpf,
        $email,
        $cellphone,
        $phone,
        $zipcode,
        $street,
        $number,
        $district,
        $city,
        $complement,
        $state,
        $category
    )
    {
        $sql = 'INSERT INTO customers (name, rg, cpf, email, cellphone, phone, zipcode, street, number, district, city, complement, state, category) VALUES (:name, :rg, :cpf, :email, :cellphone, :phone, :zipcode, :street, :number, :district, :city, :complement, :state, :category)';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name'      , $name       );
        $sql->bindValue(':rg'        , $rg         );
        $sql->bindValue(':cpf'       , $cpf        );
        $sql->bindValue(':email'     , $email      );
        $sql->bindValue(':cellphone' , $cellphone  );
        $sql->bindValue(':phone'     , $phone      );
        $sql->bindValue(':zipcode'   , $zipcode    );
        $sql->bindValue(':street'    , $street     );
        $sql->bindValue(':number'    , $number     );
        $sql->bindValue(':district'  , $district   );
        $sql->bindValue(':city'      , $city       );
        $sql->bindValue(':complement', $complement );
        $sql->bindValue(':state'     , $state      );
        $sql->bindValue(':category'  , $category   );

        return $sql->execute();

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

    public function getCostumer($id)
    {
        $array = array();
        $sql = 'SELECT * FROM customers WHERE id = :id';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function editCostumer(
        $name,
        $rg,
        $cpf,
        $email,
        $cellphone,
        $phone,
        $zipcode,
        $street,
        $number,
        $district,
        $city,
        $complement,
        $state,
        $category,
        $id
    )
    {
        $sql = 'UPDATE customers SET name = :name, name = :name, rg = :rg, cpf = :cpf, email = :email, cellphone = :cellphone, phone = :phone, zipcode = :zipcode, street = :street, number = :number, district = :district, city = :city, complement = :complement, state = :state, category = :category WHERE id = :id';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':name'      , $name      );
        $sql->bindValue(':rg'        , $rg        );
        $sql->bindValue(':cpf'       , $cpf       );
        $sql->bindValue(':email'     , $email     );
        $sql->bindValue(':cellphone' , $cellphone );
        $sql->bindValue(':phone'     , $phone     );
        $sql->bindValue(':zipcode'   , $zipcode   );
        $sql->bindValue(':street'    , $street    );
        $sql->bindValue(':number'    , $number    );
        $sql->bindValue(':district'  , $district  );
        $sql->bindValue(':city'      , $city      );
        $sql->bindValue(':complement', $complement);
        $sql->bindValue(':state'     , $state     );
        $sql->bindValue(':category'  , $category  );
        $sql->bindValue(':id'        , $id        );

        return $sql->execute();
    }

}
