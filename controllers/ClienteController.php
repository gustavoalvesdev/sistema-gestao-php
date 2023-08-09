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

        $c = new Customer();

        if (! empty($_POST['name'])) {

            $name       = $_POST['name'      ];
            $rg         = $_POST['rg'        ];
            $cpf        = $_POST['cpf'       ];
            $email      = $_POST['email'     ];
            $cellphone  = $_POST['cellphone' ];
            $phone      = $_POST['phone'     ];
            $zipcode    = $_POST['zipcode'   ];
            $street     = $_POST['street'    ];
            $number     = $_POST['number'    ];
            $district   = $_POST['district'  ];
            $city       = $_POST['city'      ];
            $complement = $_POST['complement'];
            $state      = $_POST['state'     ];

            $c->addCustomer(
                $name,
                $rg,
                $cpf,
                $email,
                $cellphone,
                $phone,
                $zipcode,
                $street,
                $number,
                $district,
                $city,
                $complement,
                $state
            );

            header('Location: '.BASE_URL.'cliente');
            exit;
        }

        $this->loadView('cliente-add', $this->data);
    }

    public function edit($id)
    {
        $this->data = array('info' => '');

        $c = new Customer();

        if (! empty($_POST['name'])) {

            $name       = addslashes($_POST['name'      ]);
            $rg         = addslashes($_POST['rg'        ]);
            $cpf        = addslashes($_POST['cpf'       ]);
            $email      = addslashes($_POST['email'     ]);
            $cellphone  = addslashes($_POST['cellphone' ]);
            $phone      = addslashes($_POST['phone'     ]);
            $zipcode    = addslashes($_POST['zipcode'   ]);
            $street     = addslashes($_POST['street'    ]);
            $number     = addslashes($_POST['number'    ]);
            $district   = addslashes($_POST['district'  ]);
            $city       = addslashes($_POST['city'      ]);
            $complement = addslashes($_POST['complement']);
            $state      = addslashes($_POST['state'     ]);

            $c->editCostumer(
                $name,
                $rg,
                $cpf,
                $email,
                $cellphone,
                $phone,
                $zipcode,
                $street,
                $number,
                $district,
                $city,
                $complement,
                $state
            );

            header('Location: '.BASE_URL.'cliente');
        }

        $this->data['info'] = $c->getCostumer($id);
        
        $this->loadView('cliente-edit', $this->data);
    }

    public function delete($id)
    {
        $c = new Customer();

        if (! empty($id)) {

            $id = addslashes($id);
            $c->deleteCustomer($id);
        }

        header('Location: '.BASE_URL.'cliente');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
