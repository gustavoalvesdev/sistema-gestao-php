<?php 

declare(strict_types=1);

namespace Models;

class Provider
{
    public int $id;
    public string $nome;
    public string $cnpj;
    public string $email;
    public string $telefone;
    public string $celular;
    public string $cep;
    public string $endereco;
    public string $numero;
    public string $complemento;
    public string $bairro;
    public string $cidade;
    public string $estado;
    public string $soft_delete;
    public string $company_id;

    public function __construct() {}
    
}
