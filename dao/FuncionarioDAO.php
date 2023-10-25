<?php 

namespace DAO;

use Database\Database;
use Models\Funcionario;

class FuncionarioDAO 
{

    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function add(Funcionario $f): bool
    {
        $sql = 'INSERT INTO workers (nome, rg, cpf, email, senha, cargo, nivel_acesso celular, telefone, cep, endereco, numero, bairro, cidade, complemento, estado) VALUES (:nome, :rg, :cpf, :email, :senha, :cargo, :nivel_acesso. :celular, :telefone, :cep, :endereco, :numero, :bairro, :cidade, :complemento, :estado)';

        $sql = $this->db->prepare($sql);

        $sql->bindValue(':nome'         , $f->getNome()       );
        $sql->bindValue(':rg'           , $f->getRg()         );
        $sql->bindValue(':cpf'          , $f->getCpf()        );
        $sql->bindValue(':email'        , $f->getEmail()      );
        $sql->bindValue(':senha'        , $f->getSenha()      );
        $sql->bindValue(':cargo'        , $f->getBairro()     );
        $sql->bindValue(':nivel_acesso' , $f->getNivelAcesso());
        $sql->bindValue(':celular'      , $f->getCelular()    );
        $sql->bindValue(':telefone'     , $f->getTelefone()   );
        $sql->bindValue(':cep'          , $f->getCep()        );
        $sql->bindValue(':endereco'     , $f->getEndereco()   );
        $sql->bindValue(':numero'       , $f->getNumero()     );
        $sql->bindValue(':bairro'       , $f->getBairro()     );
        $sql->bindValue(':cidade'       , $f->getCidade()     );
        $sql->bindValue(':complemento'  , $f->getComplemento());
        $sql->bindValue(':estado'       , $f->getEstado()     );

        return $sql->execute();

    }
}
