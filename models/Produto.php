<?php 

declare(strict_types=1);

namespace Models;

class Produto
{
    public int $id;
    public string $codigo;
    public string $nome;
    public float $preco;
    public float $quantidade;
    public float $quantidade_minima;
    public int $company_id;
    public int $soft_delete;
    public int $id_do_fornecedor;

    public function __construct() {}
}
