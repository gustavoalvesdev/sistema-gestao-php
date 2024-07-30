<?php 

namespace Controllers;

use Core\Controller;
use DAO\ClienteDAO;
use DAO\UsuarioDAO;
use BancoDeDados\BancoDeDadosMySQL;
use Models\Cliente;

class ClienteController extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        $usuario_dao = new UsuarioDAO();
        $usuario_dao::obterConexao(new BancoDeDadosMySQL);

        if (! $usuario_dao->verificarLogin($this->usuario)) {
            header('Location: '.BASE_URL.'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->dados);
    }

    public function index()
    {
        $clienteDao = new ClienteDAO();
        $clienteDao->obterConexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        if (! empty($_GET['busca'])) {

            $busca = trim(addslashes($_GET['busca']));

            $clientes = $clienteDao->todos("soft_delete = 0 AND (nome LIKE '%$busca%' OR cpf LIKE '%$busca%')  AND company_id = $idDaEmpresa");  

        } else {
            $clientes = $clienteDao->todos("soft_delete = 0  AND company_id = $idDaEmpresa");  
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
            $cliente->company_id = addslashes($_SESSION['id_da_empresa']);
            
            $clienteDao = new ClienteDAO;

            $clienteDao->obterConexao(new BancoDeDadosMySQL);

            $clienteDao->salvar($cliente);

            header('Location: '.BASE_URL.'cliente');
            exit;
        }

        $this->loadView('adicionar-cliente', $this->dados);
    }

    public function editar($id)
    {

        $clienteDao = new ClienteDAO;
        $clienteDao->obterConexao(new BancoDeDadosMySQL);

        $cliente = $clienteDao->encontrar($id, addslashes($_SESSION['id_da_empresa']));

        if ($cliente != null) {

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
        } else {
            $this->loadView('home', $this->dados);
        }

        
    }

    public function excluir($id)
    {
        $c = new ClienteDAO();
        $c->obterConexao(new BancoDeDadosMySQL);

        if (! empty($id)) {
            $c->excluir($id, addslashes($_SESSION['id_da_empresa']));
        }

        header('Location: '.BASE_URL.'cliente');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
