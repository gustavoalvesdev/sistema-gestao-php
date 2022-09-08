<?php 

require '../config.php';
require '../autoload.php';

$objSubcategories = new Subcategory();

echo json_encode($objSubcategories->getSubcategories($_POST['category']));
