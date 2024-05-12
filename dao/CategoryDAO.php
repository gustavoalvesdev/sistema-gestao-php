<?php 

declare(strict_types=1);

namespace DAO;

use Database\Interfaces\DatabaseInterface;
use Models\Category;
use PDO;

class CategoryDAO
{

    private static PDO $conn;

    public static function getConnection(DatabaseInterface $db): void
    {
        self::$conn = $db::getInstance();
    }

    public function find(int $id): Category
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $result = new Category;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetchObject(Category::class);
        }

        return $result;
    }

    public function all(string $filter = ''): array
    {
        $sql = "SELECT * FROM categories";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, Category::class);
    }

    public function delete(int $id): bool
    {

        $product = new ProductDAO;

        $sql = "UPDATE categories SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

    public function save(Category $category): bool
    {
        $sql = "INSERT INTO categories (name, company_id) VALUES (:name, :company_id)";

        if (empty($category->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $category->name);
            $sql->bindValue(':company_id', $category->company_id ?? 1);
        } else {
            $sql = "UPDATE categories SET name = :name, company_id = :company_id WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $category->name);
            $sql->bindValue(':company_id', $category->company_id ?? 1);
            $sql->bindValue(':id', $category->id);
        }

        return $sql->execute();

    }
}
