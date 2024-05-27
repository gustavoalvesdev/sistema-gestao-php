<?php 

declare(strict_types=1);

namespace Models;

class Product
{
    public int $id;
    public string $cod;
    public string $name;
    public float $price;
    public float $quantity;
    public float $min_quantity;
    public int $company_id;
    public int $soft_delete;

    public function __construct() {}
}
