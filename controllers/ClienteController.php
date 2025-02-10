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
        $usuario_dao::obter_conexao(new BancoDeDadosMySQL);

        if (! $usuario_dao->verificarLogin($this->usuario)) {
            header('Location: '.$_SERVER['BASE_URL'].'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->dados);
    }

    public function index(): void
    {

        $clienteDao = new ClienteDAO();
        $clienteDao->obter_conexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        /* Paginação */
         /* Paginação */
        $limite = 3;
        $total = $clienteDao->obter_total();
        $this->dados['paginas'] = ceil($total / $limite);
        $this->dados['pagina_atual'] = 1;

     
        $offset = ($this->dados['pagina_atual'] * $limite) - $limite;
        

        $clientes = $clienteDao->todos("soft_delete = 0 AND company_id = $idDaEmpresa", $offset, $limite);  

        $this->dados['clientes'] = $clientes;


        $this->loadView('clientes', $this->dados);
    }

    public function busca() 
    {
        $clienteDao = new ClienteDAO();
        $clienteDao->obter_conexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        if (isset($_GET['busca']) && !empty($_GET['busca'])) {
            $termo_de_busca = trim(addslashes($_GET['busca']));

            $clientes = $clienteDao->todos("soft_delete = 0 AND (nome LIKE '%$termo_de_busca%' OR cpf LIKE '%$termo_de_busca%') AND company_id = $idDaEmpresa", null, null);  

        } else {
            header('Location: '.$_SERVER['BASE_URL'].'cliente');
            exit;
        }

        $this->dados['clientes'] = $clientes;

        $this->loadView('clientes', $this->dados);
    }

    public function pagina($pagina): void 
    {
        if (empty($pagina) || intval($pagina) == 0) {
            header('Location: '.$_SERVER['BASE_URL'].'cliente');
            exit;
        }

        $clienteDao = new ClienteDAO();
        $clienteDao->obter_conexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        /* Paginação */
        $limite = 3;
        $total = $clienteDao->obter_total();
        $this->dados['paginas'] = ceil($total / $limite);
        $this->dados['pagina_atual'] = $pagina;
        if (!empty($pagina)) {
            $this->dados['pagina_atual'] = intval($pagina);
        }

   
        $offset = ($this->dados['pagina_atual'] * $limite) - $limite;
        

        $clientes = $clienteDao->todos("soft_delete = 0 AND company_id = $idDaEmpresa", $offset, $limite);  

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

            $clienteDao->obter_conexao(new BancoDeDadosMySQL);

            $clienteDao->salvar($cliente);

            header('Location: '.$_SERVER['BASE_URL'].'cliente');
            exit;
        }

        $this->loadView('adicionar-cliente', $this->dados);
    }

    public function editar($id)
    {

        $clienteDao = new ClienteDAO;
        $clienteDao->obter_conexao(new BancoDeDadosMySQL);

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
    
                header('Location: '.$_SERVER['BASE_URL'].'cliente');
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
        $c->obter_conexao(new BancoDeDadosMySQL);

        if (! empty($id)) {
            $c->excluir($id, addslashes($_SESSION['id_da_empresa']));
        }

        header('Location: '.$_SERVER['BASE_URL'].'cliente');
        exit;
    }

    public function json()
    {
        if (isset($_POST['action'])) {
            
            if (isset($_FILES['jsonFile']) && $_FILES['jsonFile']['name'] != '' && $_FILES['jsonFile']['error'] === UPLOAD_ERR_OK) {
                
                if ($_FILES['jsonFile']['type'] == 'application/json') {
                    
                    $deuCerto = false;

                    $fileTmpPath = $_FILES['jsonFile']['tmp_name'];

                    $fileContent = \file_get_contents($fileTmpPath);

                    $jsonArray = json_decode($fileContent, true);

                    if (\json_last_error() === JSON_ERROR_NONE) {
                        foreach($jsonArray as $clienteArray) {
                            
                            $cliente = new Cliente;

                            $cliente->nome = addslashes($clienteArray['nome']);
                            $cliente->rg = addslashes($clienteArray['rg']);
                            $cliente->cpf = addslashes($clienteArray['cpf']);
                            $cliente->email = addslashes($clienteArray['email']);
                            $cliente->celular = addslashes($clienteArray['celular']);
                            $cliente->telefone = addslashes($clienteArray['telefone']);
                            $cliente->cep = addslashes($clienteArray['cep']);
                            $cliente->endereco = addslashes($clienteArray['endereco']);
                            $cliente->numero = addslashes($clienteArray['numero']);
                            $cliente->bairro = addslashes($clienteArray['bairro']);
                            $cliente->cidade = addslashes($clienteArray['cidade']);
                            $cliente->estado = addslashes($clienteArray['estado']);
                            $cliente->complemento = addslashes($clienteArray['complemento']);
                            $cliente->company_id = addslashes($_SESSION['id_da_empresa']);

                            $clienteDao = new ClienteDAO;
                            $clienteDao->obter_conexao(new BancoDeDadosMySQL);

                            $deuCerto = $clienteDao->salvar($cliente);
                                
                     

                        }

                        if ($deuCerto) {
                            $_SESSION['uploadJson'] =  "<p style='color:green'>Cliente(s) salvo(s) com sucesso!</p>";
                        } else {
                            $_SESSION['uploadJson'] = "<p style='color:red;'>Falha ao salvar cliente(s)!</p>";
                        }

                        header('Location: ' . $_SERVER['BASE_URL'] . 'cliente');
                        exit;
                      
                    }

                } else {
                    header('Location: ' . $_SERVER['BASE_URL'] . 'cliente');
                    $_SESSION['formatoInvalido'] = 'Formato de arquivo inválido, o arquivo fornecido deve estar em formato JSON';
                    exit;
                }

            } else {
                header('Location: ' . $_SERVER['BASE_URL'] . 'cliente');
                exit;
            }

        } else {
            header('Location: ' . $_SERVER['BASE_URL'] . 'cliente');
            exit;
        }
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
