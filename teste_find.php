<?php

use DAO\ProductDAO;
use Database\Database;
use Models\Product;

require 'config.php';
require 'vendor/autoload.php';

$product = new Product;

$product->cod           = '767543';
$product->name          = 'Bara de Chocolate Hearsheys';
$product->price         = 22.34;
$product->quantity      = 40;
$product->minQuantity   = 20;
$product->categoryId    = 1;
$product->subCategoryId = 1;
$product->companyId     = 1;
$product->softDelete    = 0;
$product->id = 87;

$dao = new ProductDAO;

$dao->getConnection(Database::getInstance());

print($dao->save($product));
