<?php 

namespace Controllers;
use Core\Controller;
use DAO\ProviderDAO;
use Database\MySQLDatabase;
use Models\User;
use Models\Provider;

class FornecedorController extends Controller 
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
        $providerDao = new ProviderDAO();
        $providerDao->getConnection(new MySQLDatabase);


        if (! empty($_GET['busca'])) {

            $busca = trim(addslashes($_GET['busca']));

            $providers = $providerDao->all("soft_delete = 0 AND name LIKE '%$busca%' OR url LIKE '%$busca%'");  

        } else {
            $providers = $providerDao->all('soft_delete = 0');  
        }
        

        

        $this->data['providers'] = $providers;

        $this->loadView('fornecedor', $this->data);
    }

    public function add()
    {
        $data = array();

        $m = new Provider();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        }

        if (! empty($_POST['name'])) {
            $name = mb_strtoupper(addslashes($_POST['name']));
            $url  = mb_strtoupper(addslashes($_POST['url']));

            $m->addProvider($name, $url);

            header('Location: '.BASE_URL.'provider');

            exit;

        }

        $data['list'] = $m->getProviders($s);

        $this->loadView('provider-add', $data);
    }

    public function edit($providerId)
    {
        $data = array();

        $provider = new Provider();

        $id = addslashes($providerId);

        if (isset($_POST['action'])) {

            $name = addslashes($_POST['name']);
            $url = addslashes($_POST['url']);

            if (empty($name)) {
                header('Location: ' . BASE_URL . 'provider/');
                exit;
            }

            $provider->editProvider($name, $url, $providerId);

            header('Location: ' . BASE_URL . 'provider/');

        }

        if (empty($id)) {
            header('Location: ' . BASE_URL . 'provider/');
            exit;
        }

        $provInfo = $provider->getProvider($id);

        $data['info'] = $provInfo;

        $this->loadView('provider-edit', $data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
