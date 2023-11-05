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

use DAO\SubcategoryDAO;
use Database\MySQLDatabase;
use Models\Subcategory;

$objSubcategories = new SubcategoryDAO();
$objSubcategories->getConnection(new MySQLDatabase);

$category_id = $_POST['category'];

// Obtém as subcategorias para a categoria fornecida via POST
echo json_encode($objSubcategories->all("category_id = {$category_id}"));
