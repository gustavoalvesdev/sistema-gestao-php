<?php 

declare(strict_types=1);

namespace DAO;

use BancoDeDados\Interfaces\InterfaceDeBancoDeDados;
use Models\Cliente;
use PDO;

class ClienteDAO
{

    private static PDO $conexao_com_o_banco;

    public static function obter_conexao(InterfaceDeBancoDeDados $interface_de_banco_de_dados): void
    {
        self::$conexao_com_o_banco = $interface_de_banco_de_dados::obter_instancia();
    }

    public function obter_total(): int
    {
        $sql = "SELECT COUNT(*) AS c FROM clientes WHERE soft_delete = 0";
        $sql = self::$conexao_com_o_banco->query($sql);
        $sql = $sql->fetch();
        return intval($sql['c']);
    }

    public function encontrar(int $id, int $company_id): ?Cliente
    {

        $sql = "SELECT * FROM clientes WHERE soft_delete = 0 AND id = :id AND company_id = :company_id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':company_id', $company_id);
        $result = new Cliente;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetchObject(Cliente::class);
            return $result;
        }

        return null;
    }

    public function todos(string $filter = '', $offset, $limite)
    {
        $sql = "SELECT * FROM clientes";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        if ($offset !== null && $limite !== null) {
            $sql .= " LIMIT $offset, $limite";
        }

        $clientes = self::$conexao_com_o_banco->query($sql);
        $lista_de_clientes = $clientes->fetchAll(PDO::FETCH_CLASS, Cliente::class);

        return $lista_de_clientes;
    }

    public function excluir(int $id, $company_id): bool
    {
        $sql = "UPDATE clientes SET soft_delete = 1 WHERE id = :id AND company_id = :company_id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':company_id', $company_id);
        return $sql->execute();
    }

    public function salvar(Cliente $cliente): bool
    {
        $sql = "INSERT INTO clientes (nome, rg, cpf, email, celular, telefone, cep, endereco, numero, bairro, cidade, estado, complemento, company_id) VALUES (:nome, :rg, :cpf, :email, :celular, :telefone, :cep, :estado, :numero, :bairro, :cidade, :estado, :complemento, :company_id)";

        if (empty($cliente->id)) {
            $sql = self::$conexao_com_o_banco->prepare($sql);
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
            $sql->bindValue(':company_id', $cliente->company_id);
        } else {
            $sql = "UPDATE clientes SET nome = :nome, rg = :rg, cpf = :cpf, email = :email, celular = :celular, telefone = :telefone, cep = :cep, endereco = :endereco, numero = :numero, bairro = :bairro, cidade = :estado, estado = :estado, complemento = :complemento WHERE id = :id";

            $sql = self::$conexao_com_o_banco->prepare($sql);
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
