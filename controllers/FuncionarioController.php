<?php 

namespace Controllers;

use BancoDeDados\BancoDeDadosMySQL;
use Core\Controller;
use DAO\FuncionarioDAO;
use DAO\UsuarioDAO;
use Models\Funcionario;

class FuncionarioController extends Controller 
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
        $termo_a_ser_buscado = '';

        $funcionario_dao = new FuncionarioDAO();
        $funcionario_dao::obter_conexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        if (! empty($_GET['busca'])) {

            $termo_a_ser_buscado = trim($_GET['busca']);
            $lista_de_funcionarios = $funcionario_dao->todos("soft_delete = 0 AND (nome LIKE '%$termo_a_ser_buscado%' OR cpf LIKE '%$termo_a_ser_buscado%') AND company_id = $idDaEmpresa");

        } else {
            $lista_de_funcionarios = $funcionario_dao->todos("soft_delete = 0  AND company_id = $idDaEmpresa");  
        }

        

        

        $this->dados['funcionarios'] = $lista_de_funcionarios;

        $this->loadView('funcionarios', $this->dados);
    }

    public function adicionar()
    {

        if (! empty($_POST['nome'])) {

            $funcionario = new Funcionario();

            $funcionario->nome = addslashes($_POST['nome']);
            $funcionario->rg = addslashes($_POST['rg']);
            $funcionario->cpf = addslashes($_POST['cpf']);
            $funcionario->email = addslashes($_POST['email']);
            $funcionario->celular = addslashes($_POST['celular']);
            $funcionario->telefone = addslashes($_POST['telefone']);
            $funcionario->senha = addslashes($_POST['senha']);
            $funcionario->cargo = addslashes($_POST['cargo']);
            $funcionario->nivel_de_acesso = addslashes($_POST['nivel_de_acesso']);
            $funcionario->cep = addslashes($_POST['cep']);
            $funcionario->endereco = addslashes($_POST['endereco']);
            $funcionario->numero = addslashes($_POST['numero']);
            $funcionario->bairro = addslashes($_POST['bairro']);
            $funcionario->cidade = addslashes($_POST['cidade']);
            $funcionario->complemento = addslashes($_POST['complemento']);
            $funcionario->estado = addslashes($_POST['estado']);

            $funcionario_dao = new FuncionarioDAO();
            $funcionario_dao::obter_conexao(new BancoDeDadosMySQL);

            $funcionario_dao->salvar($funcionario);

            header('Location: '.BASE_URL.'funcionario');
            exit;
        }

        $this->loadView('adicionar-funcionario', $this->dados);
    }

    public function editar($id)
    {
        $funcionario_dao = new FuncionarioDAO;
        $funcionario_dao::obter_conexao(new BancoDeDadosMySQL);

        $funcionario = $funcionario_dao->encontrar($id);

        $this->dados['funcionario'] = $funcionario;

        if (isset($_POST['nome'])) {

            $funcionario = new Funcionario;

            $funcionario->nome = addslashes($_POST['nome']);
            $funcionario->rg = addslashes($_POST['rg']);
            $funcionario->cpf = addslashes($_POST['cpf']);
            $funcionario->email = addslashes($_POST['email']);
            $funcionario->celular = addslashes($_POST['celular']);
            $funcionario->telefone = addslashes($_POST['telefone']);
            $funcionario->senha = addslashes($_POST['senha']);
            $funcionario->cargo = addslashes($_POST['cargo']);
            $funcionario->nivel_de_acesso = addslashes($_POST['nivel_de_acesso']); 
            $funcionario->cep = addslashes($_POST['cep']);
            $funcionario->endereco = addslashes($_POST['endereco']);
            $funcionario->numero = addslashes($_POST['numero']);
            $funcionario->bairro = addslashes($_POST['bairro']);
            $funcionario->cidade = addslashes($_POST['cidade']);
            $funcionario->estado = addslashes($_POST['estado']);
            $funcionario->complemento = addslashes($_POST['complemento']);
            $funcionario->id = $id;

            $funcionario_dao->salvar($funcionario);

            header('Location: '.BASE_URL.'funcionario');
            exit;
        }

        $this->loadView('editar-funcionario', $this->dados);
    }

    public function excluir($id)
    {
        $funcionario_dao = new FuncionarioDAO();
        $funcionario_dao::obter_conexao(new BancoDeDadosMySQL);

        if (! empty($id)) {
            $funcionario_dao->excluir($id);
        }

        header('Location: '.BASE_URL.'funcionario');
        exit;
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
