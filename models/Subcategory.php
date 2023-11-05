<?php 

namespace Models;
use Core\Model;
use Database\Database;

class Subcategory
{

    public $id;
    public $name;
    public $category_id;
    public $company_id;

    public function __construct() {}
}
