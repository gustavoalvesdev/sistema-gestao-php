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
    public float $minQuantity;
    public int $categoryId;
    public int $subCategoryId;
    public int $companyId;
    public int $softDelete;

    public function __construct() {}
}
