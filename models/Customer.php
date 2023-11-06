<?php 

declare(strict_types=1);

namespace Models;

class Customer
{
    public int $id;
    public string $name;
    public string $rg;
    public string $cpf;
    public string $email;
    public string $cellphone;
    public string $phone;
    public string $zipcode;
    public string $street;
    public string $number;
    public string $district;
    public string $city;
    public string $state;
    public string $complement;
    public int $company_id;
    public int $soft_delete;

    public function __construct() {}
}
