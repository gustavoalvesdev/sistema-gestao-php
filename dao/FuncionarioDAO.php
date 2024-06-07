<?php 

namespace DAO;

use BancoDeDados\Interfaces\InterfaceDeBancoDeDados;
use Models\Funcionario;
use PDO;

class FuncionarioDAO 
{

    private static PDO $conexao_com_o_banco;

    public static function obter_conexao(InterfaceDeBancoDeDados $interface_de_banco_de_dados): void
    {
        self::$conexao_com_o_banco = $interface_de_banco_de_dados::obterInstancia();
    }
    
    public function encontrar(int $id): Funcionario
    {
        $sql = "SELECT * FROM funcionarios WHERE id = :id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $funcionario_encontrado = new Funcionario;

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $funcionario_encontrado = $sql->fetchObject(Funcionario::class);
        }

        return $funcionario_encontrado;
    }

    public function todos(string $filtro_de_busca = ''): array
    {
        $sql = "SELECT * FROM funcionarios";

        if ($filtro_de_busca) {
            $sql .= " WHERE $filtro_de_busca";
        }

        $funcionarios = self::$conexao_com_o_banco->query($sql);
        $lista_de_funcionarios  = $funcionarios->fetchAll(PDO::FETCH_CLASS, Funcionario::class);

        return $lista_de_funcionarios;
    }

    public function excluir(int $id): bool
    {
        $sql = "UPDATE funcionarios SET soft_delete = 1 WHERE id = :id";
        $sql = self::$conexao_com_o_banco->prepare($sql);
        $sql->bindValue(':id', $id);
        $se_excluiu_com_sucesso = $sql->execute();

        return $se_excluiu_com_sucesso;
    }

    public function salvar(Funcionario $funcionario): bool
    {
        $sql = "INSERT INTO funcionarios (nome, rg, cpf, email, celular, telefone, senha, cargo, nivel_de_acesso, cep, endereco, numero, bairro, cidade, complemento, estado, company_id, soft_delete) VALUES (:nome, :rg, :cpf, :email, :celular, :telefone, :senha, :cargo, :nivel_de_acesso, :cep, :endereco, :numero, :bairro, :cidade, :complemento, :estado, :company_id, :soft_delete)";

        $sql = self::$conexao_com_o_banco->prepare($sql);

        if (empty($funcionario->id)) {
            $sql->bindValue(':nome', $funcionario->nome);
            $sql->bindValue(':rg', $funcionario->rg);
            $sql->bindValue(':cpf', $funcionario->cpf);
            $sql->bindValue(':email', $funcionario->email);
            $sql->bindValue(':senha', $funcionario->senha);
            $sql->bindValue(':cargo', $funcionario->cargo);
            $sql->bindValue(':nivel_de_acesso', $funcionario->nivel_de_acesso);
            $sql->bindValue(':celular', $funcionario->celular);
            $sql->bindValue(':telefone', $funcionario->telefone);
            $sql->bindValue(':cep', $funcionario->cep);
            $sql->bindValue(':endereco', $funcionario->endereco);
            $sql->bindValue(':numero', $funcionario->numero);
            $sql->bindValue(':bairro', $funcionario->bairro);
            $sql->bindValue(':cidade', $funcionario->cidade);
            $sql->bindValue(':complemento', $funcionario->complemento);
            $sql->bindValue(':estado', $funcionario->estado);
            $sql->bindValue(':company_id', $funcionario->company_id ?? 1);
            $sql->bindValue(':soft_delete', $funcionario->soft_delete ?? 0);
        } else {
            $sql = "UPDATE funcionarios SET nome = :nome, rg = :rg, cpf = :cpf, email = :email, celular = :celular, telefone = :telefone, senha = :senha, cargo = :cargo, nivel_de_acesso = :nivel_de_acesso, cep = :cep, endereco = :endereco, numero = :numero, bairro = :bairro, cidade = :cidade, complemento = :complemento, estado = :estado, company_id = :company_id, soft_delete = :soft_delete WHERE id = :id";

            $sql = self::$conexao_com_o_banco->prepare($sql);

            $sql->bindValue(':id', $funcionario->id);
            $sql->bindValue(':nome', $funcionario->nome);
            $sql->bindValue(':rg', $funcionario->rg);
            $sql->bindValue(':cpf', $funcionario->cpf);
            $sql->bindValue(':email', $funcionario->email);
            $sql->bindValue(':senha', $funcionario->senha);
            $sql->bindValue(':cargo', $funcionario->cargo);
            $sql->bindValue(':nivel_de_acesso', $funcionario->nivel_de_acesso);
            $sql->bindValue(':celular', $funcionario->celular);
            $sql->bindValue(':telefone', $funcionario->telefone);
            $sql->bindValue(':cep', $funcionario->cep);
            $sql->bindValue(':endereco', $funcionario->endereco);
            $sql->bindValue(':numero', $funcionario->numero);
            $sql->bindValue(':bairro', $funcionario->bairro);
            $sql->bindValue(':cidade', $funcionario->cidade);
            $sql->bindValue(':complemento', $funcionario->complemento);
            $sql->bindValue(':estado', $funcionario->estado);
            $sql->bindValue(':company_id', $funcionario->company_id ?? 1);
            $sql->bindValue(':soft_delete', $funcionario->soft_delete ?? 0);
        }

        $se_salvou_com_sucesso = $sql->execute();

        return $se_salvou_com_sucesso;
    }
}
