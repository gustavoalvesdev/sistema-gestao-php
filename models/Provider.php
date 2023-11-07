<?php 

declare(strict_types=1);

namespace Models;

class Provider
{
    public int $id;
    public string $name;
    public string $url;
    public string $company_id;

    public function __construct() {}
    
}
