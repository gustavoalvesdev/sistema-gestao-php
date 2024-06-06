<?php 

declare(strict_types=1);

namespace Models;

class Cliente
{
    public int $id;
    public string $nome;
    public string $rg;
    public string $cpf;
    public string $email;
    public string $celular;
    public string $telefone;
    public string $cep;
    public string $endereco;
    public string $numero;
    public string $bairro;
    public string $cidade;
    public string $estado;
    public string $complemento;
    public int $company_id;
    public int $soft_delete;

    public function __construct() {}
}
