<?php 

/**
 * Imprime um JSON para obter subcategorias de uma categoria específica.
 * 
 * Esta página recebe uma solicitação POST contendo uma categoria e retorna as
 * subcategorias correspondentes em formato JSON.
 * 
 * @category    Categoria do Produto
 * @package     Handlers_SucategoriaHandler
 * @author      Gustavo Alves da Silva
 * @version     1.0
 */

require '../config.php';
require '../vendor/autoload.php';

use Models\Subcategory;

$objSubcategories = new Subcategory();

// Obtém as subcategorias para a categoria fornecida via POST
echo json_encode($objSubcategories->getSubcategories($_POST['category']));
