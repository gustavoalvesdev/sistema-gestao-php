<?php 

declare(strict_types=1);

namespace DAO;

use Database\Interfaces\DatabaseInterface;
use Models\Product;
use PDO;

class ProductDAO
{

    private static PDO $conn;

    public static function getConnection(DatabaseInterface $db): void
    {
        self::$conn = $db::getInstance();
    }

    public function find(int $id): Product
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $result = new Product;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetchObject(Product::class);
        }

        return $result;
    }

    public function all(string $filter = ''): array
    {
        $sql = "SELECT * FROM products";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, Product::class);
    }

    public function delete(int $id): bool
    {
        $sql = "UPDATE products SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

    public function save(Product $product): bool
    {
        $sql = "INSERT INTO products (cod, name, price, quantity, min_quantity, company_id, soft_delete) VALUES (:cod, :name, :price, :quantity, :min_quantity, :company_id, :soft_delete)";

        if (empty($product->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':cod', $product->cod);
            $sql->bindValue(':name', $product->name);
            $sql->bindValue(':price', $product->price);
            $sql->bindValue(':quantity', $product->quantity);
            $sql->bindValue(':min_quantity', $product->min_quantity);
            $sql->bindValue(':company_id', $product->company_id);
            $sql->bindValue(':soft_delete', $product->soft_delete ?? 0);
        } else {
            $sql = "UPDATE products SET cod = :cod, name = :name, price = :price, quantity = :quantity, min_quantity = :min_quantity, company_id = :company_id, soft_delete = :soft_delete WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':cod', $product->cod);
            $sql->bindValue(':name', $product->name);
            $sql->bindValue(':price', $product->price);
            $sql->bindValue(':quantity', $product->quantity);
            $sql->bindValue(':min_quantity', $product->min_quantity);
            $sql->bindValue(':company_id', $product->company_id);
            $sql->bindValue(':soft_delete', $product->soft_delete ?? 0);
            $sql->bindValue(':id', $product->id);
        }

        return $sql->execute();

    }

}
