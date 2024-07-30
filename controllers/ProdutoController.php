<?php

namespace Controllers;
use Core\Controller;
use DAO\ProdutoDAO;
use DAO\FornecedorDAO;
use BancoDeDados\BancoDeDadosMySQL;
use DAO\UsuarioDAO;
use Models\Usuario;
use Models\Produto;

class ProdutoController extends Controller 
{

    public function __construct()
    {
        parent::__construct();

        $usuarioDao = new UsuarioDAO();
        $usuarioDao::obterConexao(new BancoDeDadosMySQL);

        if (! $usuarioDao->verificarLogin($this->usuario)) 
        {
            header('Location: '.BASE_URL.'login');
            exit;
        }

        $this->loadView('template_parts/header', $this->dados);
    }

    public function index() 
    {

        $produto_dao = new ProdutoDAO();

        $produto_dao::obter_conexao(new BancoDeDadosMySQL);

        $termo_a_ser_buscado = '';

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        if (! empty($_GET['busca'])) {

            $termo_a_ser_buscado = trim(addslashes($_GET['busca']));
           
            $this->dados['produtos'] = $produto_dao->todos("soft_delete = 0 AND (nome LIKE '%$termo_a_ser_buscado%' OR codigo LIKE '%$termo_a_ser_buscado%') AND company_id = $idDaEmpresa");
        } else {
            $this->dados['produtos'] = $produto_dao->todos("soft_delete = 0 AND company_id = $idDaEmpresa");
        }

        

        $this->loadView('produtos', $this->dados);
    }

    public function adicionar()
    {

        $fornecedor_dao = new FornecedorDAO();
        $fornecedor_dao::obter_conexao(new BancoDeDadosMySQL);

        $this->dados['fornecedores'] = $fornecedor_dao->todos();

        if (! empty($_POST['codigo'])) {

            $produto = new Produto();

            $produto->codigo = $_POST['codigo'];
            $produto->nome = $_POST['nome'];
            $preco = str_replace('.', '' , $_POST['preco']);
            $preco = str_replace(',', '.', $preco);
            $produto->preco = floatval($preco);
            $quantidade = str_replace('.', '', $_POST['quantidade']);
            $quantidade = str_replace(',', '.', $quantidade);
            $produto->quantidade = floatval($quantidade);
            $quantidade_minima = str_replace('.', '', $_POST['quantidade_minima']);
            $quantidade_minima = str_replace(',', '.', $quantidade_minima);
            $produto->quantidade_minima = floatval($quantidade_minima);
            $produto->company_id = 1;
            $produto->soft_delete = 0;
            $produto->id_do_fornecedor = $_POST['id_do_fornecedor'];

            $produto_dao = new ProdutoDAO;
            $produto_dao::obter_conexao(new BancoDeDadosMySQL);

            $produto_dao->salvar($produto);

            header('Location: '.BASE_URL.'produto');
            exit;
        }

        $this->loadView('adicionar-produto', $this->dados);
    }

    public function editar($id)
    {    
        $produto_dao = new ProdutoDAO();

        $produto_dao::obter_conexao(new BancoDeDadosMySQL);

        $produto = $produto_dao->encontrar($id);

        $fornecedor_dao = new FornecedorDAO();
        $fornecedor_dao::obter_conexao(new BancoDeDadosMySQL);

        $this->dados['produto'] = $produto;
        $this->dados['fornecedores'] = $fornecedor_dao->todos();

        if (isset($_POST['codigo'])) {
            $produto = new Produto();
            $produto->id = addslashes($id);
            $produto->codigo = addslashes($_POST['codigo']);
            $produto->nome = addslashes($_POST['nome']);
            $preco = str_replace('.', '' , $_POST['preco']);
            $preco = str_replace(',', '.', $preco);
            $produto->preco = floatval($preco);
            $quantidade = str_replace('.', '', $_POST['quantidade']);
            $quantidade = str_replace(',', '.', $quantidade);
            $produto->quantidade = floatval($quantidade);
            $quantidade_minima = str_replace('.', '', $_POST['quantidade_minima']);
            $quantidade_minima = str_replace(',', '.', $quantidade_minima);
            $produto->quantidade_minima = floatval($quantidade_minima);
            $produto->id_do_fornecedor = addslashes($_POST['id_do_fornecedor']);
            
            $produto_dao->salvar($produto);

            header('Location: ' . BASE_URL . 'produto');
            exit;

        }

        
        $this->loadView('editar-produto', $this->dados);
    }

    public function excluir($id)
    {
        
        $produto_dao = new ProdutoDAO();
        $produto_dao::obter_conexao(new BancoDeDadosMySQL);

        if (! empty($id)) {

            $produto_dao->excluir($id);
        }

        header('Location: '.BASE_URL.'produto');
        exit;
        
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
