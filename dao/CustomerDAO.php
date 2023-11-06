<?php 

declare(strict_types=1);

namespace DAO;

use Database\Interfaces\DatabaseInterface;
use Models\Customer;
use PDO;

class CustomerDAO
{

    private static PDO $conn;

    public static function getConnection(DatabaseInterface $db): void
    {
        self::$conn = $db::getInstance();
    }

    public function find(int $id): Customer
    {
        $sql = "SELECT * FROM customers WHERE soft_delete = 0 AND id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $result = new Customer;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetchObject(Customer::class);
        }

        return $result;
    }

    public function all(string $filter = ''): array
    {
        $sql = "SELECT * FROM customers";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, Customer::class);
    }

    public function delete(int $id): bool
    {
        $sql = "UPDATE customers SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

    public function save(Customer $customer): bool
    {
        $sql = "INSERT INTO customers (name, rg, cpf, email, cellphone, phone, zipcode, street, number, district, city, state, complement) VALUES (:name, :rg, :cpf, :email, :cellphone, :phone, :zipcode, :street, :number, :district, :city, :state, :complement)";

        if (empty($customer->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $customer->name);
            $sql->bindValue(':rg', $customer->rg);
            $sql->bindValue(':cpf', $customer->cpf);
            $sql->bindValue(':email', $customer->email);
            $sql->bindValue(':cellphone', $customer->cellphone);
            $sql->bindValue(':phone', $customer->phone);
            $sql->bindValue(':zipcode', $customer->zipcode);
            $sql->bindValue(':street', $customer->street);
            $sql->bindValue(':number', $customer->number);
            $sql->bindValue(':district', $customer->district);
            $sql->bindValue(':city', $customer->city);
            $sql->bindValue(':state', $customer->state);
            $sql->bindValue(':complement', $customer->complement);
        } else {
            $sql = "UPDATE customers SET name = :name, rg = :rg, cpf = :cpf, email = :email, cellphone = :cellphone, phone = :phone, zipcode = :zipcode, street = :street, number = :number, district = :district, city = :city, state = :state, complement = :complement WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $customer->name);
            $sql->bindValue(':rg', $customer->rg);
            $sql->bindValue(':cpf', $customer->cpf);
            $sql->bindValue(':email', $customer->email);
            $sql->bindValue(':cellphone', $customer->cellphone);
            $sql->bindValue(':phone', $customer->phone);
            $sql->bindValue(':zipcode', $customer->zipcode);
            $sql->bindValue(':street', $customer->street);
            $sql->bindValue(':number', $customer->number);
            $sql->bindValue(':district', $customer->district);
            $sql->bindValue(':city', $customer->city);
            $sql->bindValue(':state', $customer->state);
            $sql->bindValue(':complement', $customer->complement);
            $sql->bindValue(':id', $customer->id);
        }

        return $sql->execute();

    }

}
