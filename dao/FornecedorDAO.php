<?php 

declare(strict_types=1);

namespace DAO;

use BancoDeDados\Interfaces\InterfaceDeBancoDeDados;
use Models\Fornecedor;
use PDO;

class FornecedorDAO
{

    private static PDO $conexao_com_o_banco;

    public static function obter_conexao(InterfaceDeBancoDeDados $interface_de_banco_de_dados): void
    {
        self::$conexao_com_o_banco = $interface_de_banco_de_dados::obterInstancia();
    }

    public function encontrar(int $id): Fornecedor
    {
        $sql = "SELECT * FROM fornecedores WHERE soft_delete = 0 AND id = :id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $fornecedor_encontrado = new Fornecedor;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $fornecedor_encontrado = $sql->fetchObject(Fornecedor::class);
        }

        return $fornecedor_encontrado;
    }

    public function todos(string $filter = ''): array
    {
        $sql = "SELECT * FROM fornecedores";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        $fornecedores = self::$conexao_com_o_banco->query($sql);
        $lista_de_fornecedores  = $fornecedores->fetchAll(PDO::FETCH_CLASS, Fornecedor::class);

        return $lista_de_fornecedores;
    }

    public function excluir(int $id): bool
    {
        $sql = "UPDATE fornecedores SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $se_excluiu_com_sucesso =  $sql->execute();
        return $se_excluiu_com_sucesso;
    }

    public function salvar(Fornecedor $fornecedor): bool
    {
        $sql = "INSERT INTO fornecedores (nome, cnpj, email, telefone, celular, cep, endereco, numero, complemento, bairro, cidade, estado, soft_delete, company_id) VALUES (:nome, :cnpj, :email, :telefone, :celular, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :estado, :soft_delete, :company_id)";

        if (empty($fornecedor->id)) {
            $sql = self::$conexao_com_o_banco->prepare($sql);
            $sql->bindValue(':nome', $fornecedor->nome);
            $sql->bindValue(':cnpj', $fornecedor->cnpj);
            $sql->bindValue(':email', $fornecedor->email);
            $sql->bindValue(':telefone', $fornecedor->telefone);
            $sql->bindValue(':celular', $fornecedor->celular);
            $sql->bindValue(':cep', $fornecedor->cep);
            $sql->bindValue(':endereco', $fornecedor->endereco);
            $sql->bindValue(':numero', $fornecedor->numero);
            $sql->bindValue(':complemento', $fornecedor->complemento);
            $sql->bindValue(':bairro', $fornecedor->bairro);
            $sql->bindValue(':cidade', $fornecedor->cidade);
            $sql->bindValue(':estado', $fornecedor->estado);
            $sql->bindValue(':soft_delete', $fornecedor->soft_delete);
            $sql->bindValue(':company_id', $fornecedor->company_id);
        } else {
            $sql = "UPDATE fornecedores SET nome = :nome, cnpj = :cnpj, email = :email, telefone = :telefone, celular = :celular, cep = :cep, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado, soft_delete = :soft_delete, company_id = :company_id WHERE id = :id";

            $sql = self::$conexao_com_o_banco->prepare($sql);
            $sql->bindValue(':nome', $fornecedor->nome);
            $sql->bindValue(':cnpj', $fornecedor->cnpj);
            $sql->bindValue(':email', $fornecedor->email);
            $sql->bindValue(':telefone', $fornecedor->telefone);
            $sql->bindValue(':celular', $fornecedor->celular);
            $sql->bindValue(':cep', $fornecedor->cep);
            $sql->bindValue(':endereco', $fornecedor->endereco);
            $sql->bindValue(':numero', $fornecedor->numero);
            $sql->bindValue(':complemento', $fornecedor->complemento);
            $sql->bindValue(':bairro', $fornecedor->bairro);
            $sql->bindValue(':cidade', $fornecedor->cidade);
            $sql->bindValue(':estado', $fornecedor->estado);
            $sql->bindValue(':soft_delete', $fornecedor->soft_delete);
            $sql->bindValue(':company_id', $fornecedor->company_id);
            $sql->bindValue(':id', $fornecedor->id);
        }

        $se_salvou_com_sucesso = $sql->execute();
        
        return $se_salvou_com_sucesso;
    }

}
