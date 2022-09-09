<?php 

namespace Controllers;

use Core\Controller;
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

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = trim($_GET['busca']);

        }

        $c = new Customer();

        $this->data['list'] = $c->getCustomers($s);

        $this->loadView('cliente', $this->data);
    }

    public function add()
    {

        $p = new Customer();

        if (! empty($_POST['name'])) {

            $name      = $_POST['name'     ];
            $cpf       = $_POST['cpf'      ];
            $phone     = $_POST['phone'    ];
            $cellphone = $_POST['cellphone'];
            $zipcode   = $_POST['zipcode'  ];
            $street    = $_POST['street'   ];
            $number    = $_POST['number'   ];
            $district  = $_POST['district' ];
            $city      = $_POST['city'     ];
            $state     = $_POST['state'    ];

            $p->addCustomer(
                $name,
                $cpf,
                $phone,
                $cellphone,
                $zipcode,
                $street,
                $number,
                $district,
                $city,
                $state
            );

            header('Location: '.BASE_URL.'cliente');
            exit;
        }

        $this->loadView('cliente-add', $this->data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
