<?php 

declare(strict_types=1);

namespace DAO;

use Database\Interfaces\DatabaseInterface;
use Models\Cliente;
use PDO;

class ClienteDAO
{

    private static PDO $conn;

    public static function obterConexao(DatabaseInterface $db): void
    {
        self::$conn = $db::getInstance();
    }

    public function encontrar(int $id): Cliente
    {
        $sql = "SELECT * FROM clientes WHERE soft_delete = 0 AND id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $result = new Cliente;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetchObject(Cliente::class);
        }

        return $result;
    }

    public function todos(string $filter = ''): array
    {
        $sql = "SELECT * FROM clientes";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, Cliente::class);
    }

    public function excluir(int $id): bool
    {
        $sql = "UPDATE clientes SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conn->prepare($sql);
        $sql->bindValue(':id', $id);
        return $sql->execute();
    }

    public function salvar(Cliente $cliente): bool
    {
        $sql = "INSERT INTO clientes (nome, rg, cpf, email, celular, telefone, cep, endereco, numero, bairro, cidade, estado, complemento) VALUES (:nome, :rg, :cpf, :email, :celular, :telefone, :cep, :estado, :numero, :bairro, :cidade, :estado, :complemento)";

        if (empty($cliente->id)) {
            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':name', $cliente->nome);
            $sql->bindValue(':rg', $cliente->rg);
            $sql->bindValue(':cpf', $cliente->cpf);
            $sql->bindValue(':email', $cliente->email);
            $sql->bindValue(':celular', $cliente->celular);
            $sql->bindValue(':telefone', $cliente->telefone);
            $sql->bindValue(':cep', $cliente->cep);
            $sql->bindValue(':endereco', $cliente->endereco);
            $sql->bindValue(':numero', $cliente->numero);
            $sql->bindValue(':bairro', $cliente->bairro);
            $sql->bindValue(':cidade', $cliente->cidade);
            $sql->bindValue(':estado', $cliente->estado);
            $sql->bindValue(':complemento', $cliente->complemento);
        } else {
            $sql = "UPDATE clientes SET nome = :nome, rg = :rg, cpf = :cpf, email = :email, celular = :celular, telefone = :telefone, cep = :cep, endereco = :endereco, numero = :numero, bairro = :bairro, cidade = :estado, estado = :estado, complemento = :complemento WHERE id = :id";

            $sql = self::$conn->prepare($sql);
            $sql->bindValue(':nome', $cliente->nome);
            $sql->bindValue(':rg', $cliente->rg);
            $sql->bindValue(':cpf', $cliente->cpf);
            $sql->bindValue(':email', $cliente->email);
            $sql->bindValue(':celular', $cliente->celular);
            $sql->bindValue(':telefone', $cliente->telefone);
            $sql->bindValue(':cep', $cliente->cep);
            $sql->bindValue(':endereco', $cliente->endereco);
            $sql->bindValue(':numero', $cliente->numero);
            $sql->bindValue(':bairro', $cliente->bairro);
            $sql->bindValue(':cidade', $cliente->cidade);
            $sql->bindValue(':estado', $cliente->estado);
            $sql->bindValue(':complemento', $cliente->complemento);
            $sql->bindValue(':id', $cliente->id);
        }

        return $sql->execute();

    }

}
