<?php 

declare(strict_types=1);

namespace DAO;

use Database\Interfaces\DatabaseInterface;
use Models\Provider;
use PDO;

class ProviderDAO
{

    private static PDO $conn;

    public static function getConnection(DatabaseInterface $db): void
    {
        self::$conn = $db::getInstance();
    }

    public function find(int $id): Provider
    {
        $sql = "SELECT * FROM providers WHERE soft_delete = 0 AND id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $result = new Provider;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetchObject(Provider::class);
        }

        return $result;
    }

    public function all(string $filter = ''): array
    {
        $sql = "SELECT * FROM providers";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, Provider::class);
    }

    public function delete(int $id): bool
    {
        $sql = "UPDATE providers SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

    public function save(Provider $provider): bool
    {
        $sql = "INSERT INTO providers (name, url) VALUES (:name, :url)";

        if (empty($provider->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $provider->name);
            $sql->bindValue(':url', $provider->url);
        } else {
            $sql = "UPDATE providers SET name = :name, url = :url WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $provider->name);
            $sql->bindValue(':url', $provider->url);
            $sql->bindValue(':id', $provider->id);
        }

        return $sql->execute();

    }

}
