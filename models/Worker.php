<?php 

declare(strict_types=1);

namespace Models;

class Worker
{
    public int $id;
    public string $nome;
    public string $cpf;
    public string $email;
    public string $celular;
    public string $telefone;
    public string $senha;
    public string $cargo;
    public string $nivel_acesso;
    public string $cep;
    public string $endereco;
    public string $numero;
    public string $bairro;
    public string $cidade;
    public string $complemento;
    public string $estado;

    public function __construct() { }

}
