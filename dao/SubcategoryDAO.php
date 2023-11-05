<?php 

declare(strict_types=1);

namespace DAO;

use Database\Interfaces\DatabaseInterface;
use Models\Category;
use Models\Subcategory;
use PDO;

class SubcategoryDAO
{

    private static PDO $conn;

    public static function getConnection(DatabaseInterface $db): void
    {
        self::$conn = $db::getInstance();
    }

    public function find(int $id): Subcategory
    {
        $sql = "SELECT * FROM subcategories WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $result = new Subcategory;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetchObject(Subcategory::class);
        }

        return $result;
    }

    public function all(string $filter = ''): array
    {
        $sql = "SELECT * FROM subcategories";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, Subcategory::class);
    }

    public function save(Subcategory $subcategory): bool
    {
        $sql = "INSERT INTO subcategories (name, category_id, company_id) VALUES (:name, :category_id, :company_id)";

        if (empty($subcategory->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $subcategory->name);
            $sql->bindValue(':category_id', $subcategory->category_id);
            $sql->bindValue(':company_id', $subcategory->company_id);
        } else {
            $sql = "UPDATE categories SET name = :name, company_id = :company_id WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $subcategory->name);
            $sql->bindValue(':category_id', $subcategory->category_id);
            $sql->bindValue(':company_id', $subcategory->company_id);
            $sql->bindValue(':id', $subcategory->id);
        }

        return $sql->execute();

    }

}
