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

            $providers = $providerDao->all("soft_delete = 0 AND name LIKE '%$busca%' OR cnpj LIKE '%$busca%'");  

        } else {
            $providers = $providerDao->all('soft_delete = 0');  
        }
        

        

        $this->data['providers'] = $providers;

        $this->loadView('fornecedor', $this->data);
    }

    public function add()
    {
        $data = array();

        $provider = new Provider();
        $providerDao = new ProviderDAO();
        $providerDao->getConnection(new MySQLDatabase);

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        }

        if (! empty($_POST['nome'])) {
            

            $provider->nome = addslashes($_POST['nome']);
            $provider->cnpj = addslashes($_POST['cnpj']);
            $provider->email = addslashes($_POST['email']);
            $provider->celular = addslashes($_POST['celular']);
            $provider->telefone = addslashes($_POST['telefone']);
            $provider->cep = addslashes($_POST['cep']);
            $provider->endereco = addslashes($_POST['endereco']);
            $provider->numero = addslashes($_POST['numero']);
            $provider->bairro = addslashes($_POST['bairro']);
            $provider->cidade = addslashes($_POST['cidade']);
            $provider->complemento = addslashes($_POST['complemento']);
            $provider->estado = addslashes($_POST['estado']);
            $provider->soft_delete = 0;
            $provider->company_id = 1;

            $providerDao->save($provider);

            header('Location: '.BASE_URL.'fornecedor');

            exit;

        }

        $data['list'] = $providerDao->all($s);

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

    public function delete($providerId)
    {
        $providerDao = new ProviderDAO();
        $providerDao->getConnection(new MySQLDatabase);

        if (!empty($providerId)) {
            $providerDao->delete($providerId);
        }

        header('Location: ' . BASE_URL . 'fornecedor');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
