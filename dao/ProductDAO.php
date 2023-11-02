<?php 

declare(strict_types=1);

namespace DAO;

use Models\Product;
use PDO;

class ProductDAO
{

    private static $conn;

    public static function getConnection(PDO $conn): void
    {
        self::$conn = $conn;
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

    public function save(Product $product): bool
    {
        $sql = "INSERT INTO products (cod, name, price, quantity, min_quantity, category_id, subcategory_id, company_id, soft_delete) VALUES (:cod, :name, :price, :quantity, :min_quantity, :category_id, :subcategory_id, :company_id, :soft_delete)";

        if (empty($product->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':cod', $product->cod);
            $sql->bindValue(':name', $product->name);
            $sql->bindValue(':price', $product->price);
            $sql->bindValue(':quantity', $product->quantity);
            $sql->bindValue(':min_quantity', $product->minQuantity);
            $sql->bindValue(':category_id', $product->categoryId);
            $sql->bindValue(':subcategory_id', $product->subCategoryId);
            $sql->bindValue(':company_id', $product->companyId);
            $sql->bindValue(':soft_delete', $product->softDelete);
        } else {
            $sql = "UPDATE products SET cod = :cod, name = :name, price = :price, quantity = :quantity, min_quantity = :min_quantity, category_id = :category_id, subcategory_id = :subcategory_id, company_id = :company_id, soft_delete = :soft_delete WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':cod', $product->cod);
            $sql->bindValue(':name', $product->name);
            $sql->bindValue(':price', $product->price);
            $sql->bindValue(':quantity', $product->quantity);
            $sql->bindValue(':min_quantity', $product->minQuantity);
            $sql->bindValue(':category_id', $product->categoryId);
            $sql->bindValue(':subcategory_id', $product->subCategoryId);
            $sql->bindValue(':company_id', $product->companyId);
            $sql->bindValue(':soft_delete', $product->softDelete);
            $sql->bindValue(':id', $product->id);
        }

        return $sql->execute();

    }

}
