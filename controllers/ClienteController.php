<?php 

namespace Controllers;

use Core\Controller;
use DAO\ClienteDAO;
use Database\BancoDeDadosMySQL;
use Models\User;
use Models\Cliente;

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

        $this->loadView('template_parts/header', $this->dados);
    }

    public function index()
    {
        $clienteDao = new ClienteDAO();
        $clienteDao->obterConexao(new BancoDeDadosMySQL);


        if (! empty($_GET['busca'])) {

            $busca = trim(addslashes($_GET['busca']));

            $clientes = $clienteDao->todos("soft_delete = 0 AND (nome LIKE '%$busca%' OR cpf LIKE '%$busca%')");  

        } else {
            $clientes = $clienteDao->todos('soft_delete = 0');  
        }
        

        

        $this->dados['clientes'] = $clientes;

        $this->loadView('clientes', $this->dados);
    }

    public function adicionar()
    {
        if (! empty($_POST['nome'])) {
            
            $cliente = new Cliente();
            
            $cliente->nome = addslashes($_POST['nome']);
            $cliente->rg = addslashes($_POST['rg']);
            $cliente->cpf = addslashes($_POST['cpf']);
            $cliente->email = addslashes($_POST['email']);
            $cliente->celular = addslashes($_POST['celular']);
            $cliente->telefone = addslashes($_POST['telefone']);
            $cliente->cep = addslashes($_POST['cep']);
            $cliente->endereco = addslashes($_POST['endereco']);
            $cliente->numero = addslashes($_POST['numero']);
            $cliente->bairro = addslashes($_POST['bairro']);
            $cliente->cidade = addslashes($_POST['cidade']);
            $cliente->estado = addslashes($_POST['estado']);
            $cliente->complemento = addslashes($_POST['complemento']);
            
            $clienteDao = new ClienteDAO;

            $clienteDao->obterConexao(new BancoDeDadosMySQL);

            $clienteDao->salvar($cliente);

            header('Location: '.BASE_URL.'clientes');
            exit;
        }

        $this->loadView('adicionar-cliente', $this->dados);
    }

    public function editar($id)
    {

        $clienteDao = new ClienteDAO;
        $clienteDao->obterConexao(new BancoDeDadosMySQL);

        $cliente = $clienteDao->encontrar($id);

        $this->dados['cliente'] = $cliente;

        if (isset($_POST['nome'])) {

            $cliente = new Cliente;

            $cliente->nome = addslashes($_POST['nome']);
            $cliente->rg = addslashes($_POST['rg']);
            $cliente->cpf = addslashes($_POST['cpf']);
            $cliente->email = addslashes($_POST['email']);
            $cliente->celular = addslashes($_POST['celular']);
            $cliente->telefone = addslashes($_POST['telefone']);
            $cliente->cep = addslashes($_POST['cep']);
            $cliente->endereco = addslashes($_POST['endereco']);
            $cliente->numero = addslashes($_POST['numero']);
            $cliente->bairro = addslashes($_POST['bairro']);
            $cliente->cidade = addslashes($_POST['cidade']);
            $cliente->estado = addslashes($_POST['estado']);
            $cliente->complemento = addslashes($_POST['complemento']);
            $cliente->id = $id;

            $clienteDao->salvar($cliente);

            header('Location: '.BASE_URL.'cliente');
            exit;
        }

        $this->loadView('editar-cliente', $this->dados);
    }

    public function excluir($id)
    {
        $c = new ClienteDAO();
        $c->obterConexao(new BancoDeDadosMySQL);

        if (! empty($id)) {
            $c->excluir($id);
        }

        header('Location: '.BASE_URL.'cliente');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
