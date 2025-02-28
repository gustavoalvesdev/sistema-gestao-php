<?php 

declare(strict_types=1);

namespace DAO;

use BancoDeDados\Interfaces\InterfaceDeBancoDeDados;
use Models\Produto;
use PDO;

class ProdutoDAO
{

    private static PDO $conexao_com_o_banco;

    public static function obter_conexao(InterfaceDeBancoDeDados $interface_de_banco_de_dados): void
    {
        self::$conexao_com_o_banco = $interface_de_banco_de_dados::obter_instancia();
    }

    public function obter_total(): int
    {
        $sql = "SELECT COUNT(*) AS c FROM produtos WHERE soft_delete = 0";
        $sql = self::$conexao_com_o_banco->query($sql);
        $sql = $sql->fetch();
        return intval($sql['c']);
    }

    public function encontrar(int $id): Produto
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $produto_encontrado = new Produto;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $produto_encontrado = $sql->fetchObject(Produto::class);
        }

        return $produto_encontrado;
    }

    public function todos(string $filter = '', $offset, $limite): array
    {
        $sql = "SELECT * FROM produtos";

        if ($filter) {
            $sql .= " WHERE $filter";
        }

        if ($offset !== null && $limite !== null) {
            $sql .= " LIMIT $offset, $limite";
        }

        $produtos = self::$conexao_com_o_banco->query($sql);
        $lista_de_produtos = $produtos->fetchAll(PDO::FETCH_CLASS, Produto::class);

        return $lista_de_produtos;
    }

    public function excluir(int $id): bool
    {
        $sql = "UPDATE produtos SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $se_excluiu_com_sucesso = $sql->execute();

        return $se_excluiu_com_sucesso;
    }

    public function salvar(Produto $produto): bool
    {
        $sql = "INSERT INTO produtos (codigo, nome, preco, quantidade, quantidade_minima, company_id, soft_delete, id_do_fornecedor) VALUES (:codigo, :nome, :preco, :quantidade, :quantidade_minima, :company_id, :soft_delete, :id_do_fornecedor)";

        if (empty($produto->id)) {
            $sql = self::$conexao_com_o_banco->prepare($sql);
            $sql->bindValue(':codigo', $produto->codigo);
            $sql->bindValue(':nome', $produto->nome);
            $sql->bindValue(':preco', $produto->preco);
            $sql->bindValue(':quantidade', $produto->quantidade);
            $sql->bindValue(':quantidade_minima', $produto->quantidade_minima);
            $sql->bindValue(':company_id', $produto->company_id ?? 1);
            $sql->bindValue(':soft_delete', $produto->soft_delete ?? 0);
            $sql->bindValue(':id_do_fornecedor', $produto->id_do_fornecedor);
        } else {
            $sql = "UPDATE produtos SET codigo = :codigo, nome = :nome, preco = :preco, quantidade = :quantidade, quantidade_minima = :quantidade_minima, company_id = :company_id, soft_delete = :soft_delete, id_do_fornecedor = :id_do_fornecedor WHERE id = :id";

            $sql = self::$conexao_com_o_banco->prepare($sql);
            $sql->bindValue(':codigo', $produto->codigo);
            $sql->bindValue(':nome', $produto->nome);
            $sql->bindValue(':preco', $produto->preco);
            $sql->bindValue(':quantidade', $produto->quantidade);
            $sql->bindValue(':quantidade_minima', $produto->quantidade_minima);
            $sql->bindValue(':company_id', $produto->company_id ?? 1);
            $sql->bindValue(':soft_delete', $produto->soft_delete ?? 0);
            $sql->bindValue(':id_do_fornecedor', $produto->id_do_fornecedor);
            $sql->bindValue(':id', $produto->id);
        }

        $se_salvou_com_sucesso = $sql->execute();

        return $se_salvou_com_sucesso;
    }

}
