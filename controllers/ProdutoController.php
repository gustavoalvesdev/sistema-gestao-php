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

        /* Paginação */
         /* Paginação */
         $limite = 3;
         $total = $produto_dao->obter_total();
         $this->dados['paginas'] = ceil($total / $limite);
         $this->dados['pagina_atual'] = 1;

         $offset = ($this->dados['pagina_atual'] * $limite) - $limite;

         $produtos = $produto_dao->todos("soft_delete = 0 AND company_id = $idDaEmpresa", $offset, $limite);  

         $this->dados['produtos'] = $produtos;

        $this->loadView('produtos', $this->dados);
    }

    public function adicionar()
    {

        $fornecedor_dao = new FornecedorDAO();
        $fornecedor_dao::obter_conexao(new BancoDeDadosMySQL);

        $this->dados['fornecedores'] = $fornecedor_dao->todos('', null, null);

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
        $this->dados['fornecedores'] = $fornecedor_dao->todos('', null, null);

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

    public function busca() 
    {
        $produto_dao = new ProdutoDAO();
        $produto_dao->obter_conexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        if (isset($_GET['busca']) && !empty($_GET['busca'])) {
            $termo_de_busca = trim(addslashes($_GET['busca']));

            $produtos = $produto_dao->todos("soft_delete = 0 AND (codigo LIKE '%$termo_de_busca%' OR nome LIKE '%$termo_de_busca%') AND company_id = $idDaEmpresa", null, null);  

        } else {
            header('Location: '.$_SERVER['BASE_URL'].'produto');
            exit;
        }

        $this->dados['produtos'] = $produtos;

        $this->loadView('produtos', $this->dados);
    }

    public function pagina($pagina): void 
    {
        if (empty($pagina) || intval($pagina) == 0) {
            header('Location: '.$_SERVER['BASE_URL'].'produto');
            exit;
        }

        $produto_dao = new ProdutoDAO();
        $produto_dao->obter_conexao(new BancoDeDadosMySQL);

        $idDaEmpresa = $_SESSION['id_da_empresa'];

        /* Paginação */
        $limite = 3;
        $total = $produto_dao->obter_total();
        $this->dados['paginas'] = ceil($total / $limite);
        $this->dados['pagina_atual'] = $pagina;
        if (!empty($pagina)) {
            $this->dados['pagina_atual'] = intval($pagina);
        }

   
        $offset = ($this->dados['pagina_atual'] * $limite) - $limite;
        

        $produtos = $produto_dao->todos("soft_delete = 0 AND company_id = $idDaEmpresa", $offset, $limite);  

        $this->dados['produtos'] = $produtos;

        $this->loadView('produtos', $this->dados);


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
                            $produto->preco = floatval($produtoArray['preco']);
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
                            $_SESSION['uploadJson'] =  "<p style='color:green'>Produto(s) salvo(s) com sucesso!</p>";
                        } else {
                            $_SESSION['uploadJson'] = "<p style='color:red;'>Falha ao salvar produto(s)!</p>";
                        }

                        header('Location: ' . $_SERVER['BASE_URL'] . 'produto');
                        exit;
                      
                    } else {
                        header('Location: ' . $_SERVER['BASE_URL'] . 'produto');
                        $_SESSION['formatoInvalido'] = 'Erro ao enviar arquivo JSON';
                        exit;
                    }

                } else {
                    header('Location: ' . $_SERVER['BASE_URL'] . 'produto');
                    $_SESSION['formatoInvalido'] = 'Formato de arquivo inválido, o arquivo fornecido deve estar em formato JSON';
                    exit;
                }

            } else {
                header('Location: ' . $_SERVER['BASE_URL'] . 'produto');
                exit;
            }

        } else {
            header('Location: ' . $_SERVER['BASE_URL'] . 'produto');
            exit;
        }
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }

}
