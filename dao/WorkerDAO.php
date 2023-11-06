<?php 

declare(strict_types=1);

namespace DAO;

use Database\Interfaces\DatabaseInterface;
use Models\Worker;
use PDO;

class WorkerDAO 
{

    private static PDO $conn;

    public static function getConnection(DatabaseInterface $db): void
    {
        self::$conn = $db::getInstance();
    }

    public function all(string $filter = ''): array
    {
        $sql = "SELECT * FROM workers";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, Worker::class);
    }

    public function delete(int $id): bool
    {
        $sql = "UPDATE workers SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

}
