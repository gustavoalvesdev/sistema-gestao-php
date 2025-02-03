<?php 

namespace Controllers;

use BancoDeDados\BancoDeDadosMySQL;
use Core\Controller;
use DAO\FornecedorDAO;
use DAO\UsuarioDAO;
use Models\Fornecedor;

class FornecedorController extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        $usuario_dao = new UsuarioDAO();
        $usuario_dao::obterConexao(new BancoDeDadosMySQL);

        if (! $usuario_dao->verificarLogin($this->usuario)) {
            header('Location: '.$_SERVER['BASE_URL'].'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->dados);
    }

    public function index()
    {
        $fornecedorDao = new FornecedorDAO();
        $fornecedorDao->obter_conexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        if (! empty($_GET['busca'])) {

            $termo_de_busca = trim(addslashes($_GET['busca']));

            $fornecedores = $fornecedorDao->todos("soft_delete = 0 AND (nome LIKE '%$termo_de_busca%' OR cnpj LIKE '%$termo_de_busca%') AND company_id = $idDaEmpresa");  

        } else {
            $fornecedores = $fornecedorDao->todos("soft_delete = 0 AND company_id = $idDaEmpresa");  
        }
        

        

        $this->dados['fornecedores'] = $fornecedores;

        $this->loadView('fornecedores', $this->dados);
    }

    public function adicionar()
    {
        $fornecedor = new Fornecedor();
        $fornecedorDao = new FornecedorDAO();
        $fornecedorDao->obter_conexao(new BancoDeDadosMySQL);

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        }

        if (! empty($_POST['nome'])) {
            

            $fornecedor->nome = addslashes($_POST['nome']);
            $fornecedor->cnpj = addslashes($_POST['cnpj']);
            $fornecedor->email = addslashes($_POST['email']);
            $fornecedor->celular = addslashes($_POST['celular']);
            $fornecedor->telefone = addslashes($_POST['telefone']);
            $fornecedor->cep = addslashes($_POST['cep']);
            $fornecedor->endereco = addslashes($_POST['endereco']);
            $fornecedor->numero = addslashes($_POST['numero']);
            $fornecedor->bairro = addslashes($_POST['bairro']);
            $fornecedor->cidade = addslashes($_POST['cidade']);
            $fornecedor->complemento = addslashes($_POST['complemento']);
            $fornecedor->estado = addslashes($_POST['estado']);
            $fornecedor->soft_delete = 0;
            $fornecedor->company_id = 1;

            $fornecedorDao->salvar($fornecedor);

            header('Location: '.$_SERVER['BASE_URL'].'fornecedor');

            exit;

        }

        //$this->dados['lista'] = $fornecedorDao->todos($s);

        $this->loadView('adicionar-fornecedor', $this->dados);
    }

    public function editar($idDoFornecedor)
    {
        $fornecedor = new Fornecedor();

        $id = addslashes($idDoFornecedor);

        $fornecedor_dao = new FornecedorDAO();
        $fornecedor_dao->obter_conexao(new BancoDeDadosMySQL);

        if (isset($_POST['action'])) {

            $fornecedor->id = $id;
            $fornecedor->nome = addslashes($_POST['nome']);
            $fornecedor->cnpj = addslashes($_POST['cnpj']);
            $fornecedor->email = addslashes($_POST['email']);
            $fornecedor->celular = addslashes($_POST['celular']);
            $fornecedor->telefone = addslashes($_POST['telefone']);
            $fornecedor->cep = addslashes($_POST['cep']);
            $fornecedor->endereco = addslashes($_POST['endereco']);
            $fornecedor->numero = addslashes($_POST['numero']);
            $fornecedor->bairro = addslashes($_POST['bairro']);
            $fornecedor->cidade = addslashes($_POST['cidade']);
            $fornecedor->complemento = addslashes($_POST['complemento']);
            $fornecedor->estado = addslashes($_POST['estado']);
            $fornecedor->soft_delete = 0;
            $fornecedor->company_id = 1;

            if (empty($fornecedor->nome)) {
                header('Location: ' . $_SERVER['BASE_URL'] . 'fornecedor/');
                exit;
            }

            
            
            $fornecedor_dao->salvar($fornecedor);

            header('Location: ' . $_SERVER['BASE_URL'] . 'fornecedor');

        }

        if (empty($id)) {
            header('Location: ' . $_SERVER['BASE_URL'] . 'fornecedor');
            exit;
        }

        $fornecedor = $fornecedor_dao->encontrar($id);

        $this->dados['fornecedor'] = $fornecedor;

        $this->loadView('editar-fornecedor', $this->dados);
    }

    public function excluir($idDoFornecedor)
    {
        $fornecedor_dao = new FornecedorDAO();
        $fornecedor_dao->obter_conexao(new BancoDeDadosMySQL);

        if (!empty($idDoFornecedor)) {
            $fornecedor_dao->excluir($idDoFornecedor);
        }

        header('Location: ' . $_SERVER['BASE_URL'] . 'fornecedor');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
