<?php 

namespace Controllers;

use Core\Controller;
use DAO\CustomerDAO;
use DAO\ProviderDAO;
use Database\MySQLDatabase;
use Models\User;
use Models\Customer;

class ClienteController extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->user = new User();

        if (! $this->user->checkLogin()) {
            header('Location: '.BASE_URL.'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->data);
    }

    public function index()
    {
        $customerDao = new CustomerDAO();
        $customerDao->getConnection(new MySQLDatabase);


        if (! empty($_GET['busca'])) {

            $busca = trim(addslashes($_GET['busca']));

            $customers = $customerDao->all("soft_delete = 0 AND name LIKE '%$busca%' OR cpf LIKE '%$busca%'");  

        } else {
            $customers = $customerDao->all('soft_delete = 0');  
        }
        

        

        $this->data['customers'] = $customers;

        $this->loadView('cliente', $this->data);
    }

    public function add()
    {
        if (! empty($_POST['name'])) {
            
            $customer = new Customer();
            
            $customer->name = addslashes($_POST['name']);
            $customer->rg = addslashes($_POST['rg']);
            $customer->cpf = addslashes($_POST['cpf']);
            $customer->email = addslashes($_POST['email']);
            $customer->cellphone = addslashes($_POST['cellphone']);
            $customer->phone = addslashes($_POST['phone']);
            $customer->zipcode = addslashes($_POST['zipcode']);
            $customer->street = addslashes($_POST['street']);
            $customer->number = addslashes($_POST['number']);
            $customer->district = addslashes($_POST['district']);
            $customer->city = addslashes($_POST['city']);
            $customer->state = addslashes($_POST['state']);
            $customer->complement = addslashes($_POST['complement']);
            
            $customerDao = new CustomerDAO;

            $customerDao->getConnection(new MySQLDatabase);

            $customerDao->save($customer);

            header('Location: '.BASE_URL.'cliente');
            exit;
        }

        $this->loadView('cliente-add', $this->data);
    }

    public function edit($id)
    {

        $customerDao = new CustomerDAO;
        $customerDao->getConnection(new MySQLDatabase);

        $customer = $customerDao->find($id);

        $this->data['customer'] = $customer;

        if (isset($_POST['name'])) {

            $customer = new Customer;

            $customer->name = addslashes($_POST['name']);
            $customer->rg = addslashes($_POST['rg']);
            $customer->cpf = addslashes($_POST['cpf']);
            $customer->email = addslashes($_POST['email']);
            $customer->cellphone = addslashes($_POST['cellphone']);
            $customer->phone = addslashes($_POST['phone']);
            $customer->zipcode = addslashes($_POST['zipcode']);
            $customer->street = addslashes($_POST['street']);
            $customer->number= addslashes($_POST['number']);
            $customer->district = addslashes($_POST['district']);
            $customer->city = addslashes($_POST['city']);
            $customer->state = addslashes($_POST['state']);
            $customer->complement = addslashes($_POST['complement']);
            $customer->id = $id;

            $customerDao->save($customer);

            header('Location: '.BASE_URL.'cliente');
            exit;
        }

        $this->loadView('cliente-edit', $this->data);
    }

    public function delete($id)
    {
        $c = new CustomerDAO();
        $c->getConnection(new MySQLDatabase);

        if (! empty($id)) {
            $c->delete($id);
        }

        header('Location: '.BASE_URL.'cliente');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
