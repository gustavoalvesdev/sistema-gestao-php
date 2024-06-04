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
        $sql = "INSERT INTO providers (nome, cnpj, email, telefone, celular, cep, endereco, numero, complemento, bairro, cidade, estado, soft_delete, company_id) VALUES (:nome, :cnpj, :email, :telefone, :celular, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :estado, :soft_delete, :company_id)";

        if (empty($provider->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':nome', $provider->nome);
            $sql->bindValue(':cnpj', $provider->cnpj);
            $sql->bindValue(':email', $provider->email);
            $sql->bindValue(':telefone', $provider->telefone);
            $sql->bindValue(':celular', $provider->celular);
            $sql->bindValue(':cep', $provider->cep);
            $sql->bindValue(':endereco', $provider->endereco);
            $sql->bindValue(':numero', $provider->numero);
            $sql->bindValue(':complemento', $provider->complemento);
            $sql->bindValue(':bairro', $provider->bairro);
            $sql->bindValue(':cidade', $provider->cidade);
            $sql->bindValue(':estado', $provider->estado);
            $sql->bindValue(':soft_delete', $provider->soft_delete);
            $sql->bindValue(':company_id', $provider->company_id);
        } else {
            $sql = "UPDATE providers SET nome = :nome, cnpj = :cnpj, email = :email, telefone = :telefone, celular = :celular, cep = :cep, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado, soft_delete = :soft_delete, company_id = :company_id WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $provider->nome);
            $sql->bindValue(':cnpj', $provider->cnpj);
            $sql->bindValue(':email', $provider->email);
            $sql->bindValue(':telefone', $provider->telefone);
            $sql->bindValue(':celular', $provider->celular);
            $sql->bindValue(':cep', $provider->cep);
            $sql->bindValue(':endereco', $provider->endereco);
            $sql->bindValue(':numero', $provider->numero);
            $sql->bindValue(':complemento', $provider->complemento);
            $sql->bindValue(':bairro', $provider->bairro);
            $sql->bindValue(':cidade', $provider->cidade);
            $sql->bindValue(':estado', $provider->estado);
            $sql->bindValue(':soft_delete', $provider->soft_delete);
            $sql->bindValue(':company_id', $provider->company_id);
            $sql->bindValue(':id', $provider->id);
        }

        return $sql->execute();

    }

}
