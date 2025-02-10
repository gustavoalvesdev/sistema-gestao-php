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
        $usuarioDao::obter_conexao(new BancoDeDadosMySQL);

        if (! $usuarioDao->verificarLogin($this->usuario)) 
        {
            header('Location: '.$_SERVER['BASE_URL'].'login');
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

            header('Location: '.$_SERVER['BASE_URL'].'produto');
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

            header('Location: ' . $_SERVER['BASE_URL'] . 'produto');
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

        header('Location: '.$_SERVER['BASE_URL'].'produto');
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
                        foreach($jsonArray as $produtoArray) {
                            
                            
                            $produto = new Produto();

                            $produto->codigo = $produtoArray['codigo'];
                            $produto->nome = $produtoArray['nome'];
                            $preco = str_replace('.', '' , $produtoArray['preco']);
                            $preco = str_replace(',', '.', $preco);
                            $produto->preco = floatval($preco);
                            $quantidade = str_replace('.', '', $produtoArray['quantidade']);
                            $quantidade = str_replace(',', '.', $quantidade);
                            $produto->quantidade = floatval($quantidade);
                            $quantidade_minima = str_replace('.', '', $produtoArray['quantidade_minima']);
                            $quantidade_minima = str_replace(',', '.', $quantidade_minima);
                            $produto->quantidade_minima = floatval($quantidade_minima);
                            $produto->company_id = addslashes($_SESSION['id_da_empresa']);;
                            $produto->soft_delete = 0;
                            $produto->id_do_fornecedor = $produtoArray['id_do_fornecedor'];

                            $produto_dao = new ProdutoDAO;
                            $produto_dao::obter_conexao(new BancoDeDadosMySQL);

                            $deuCerto = $produto_dao->salvar($produto);

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
