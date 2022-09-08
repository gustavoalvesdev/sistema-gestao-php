<?php 

require '../config.php';
require '../vendor/autoload.php';

use Models\Subcategory;

$objSubcategories = new Subcategory();

echo json_encode($objSubcategories->getSubcategories($_POST['category']));
