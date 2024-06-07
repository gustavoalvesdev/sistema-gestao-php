<?php 

namespace Controllers;

use BancoDeDados\BancoDeDadosMySQL;
use Core\Controller;
use DAO\ProdutoDAO;
use DAO\UsuarioDAO;

class RelatorioController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $usuario_dao = new UsuarioDAO();

        if (! $usuario_dao->verificarLogin($this->usuario)) {
            header('Location: '.BASE_URL.'login');
            exit;
        }


        $this->dados['menu'] = array(
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL,
                'text' => 'Voltar à Listagem'
            ),
            array(
                'class' => '',
                'id' => 'btn-imprimir',
                'link' => BASE_URL,
                'text' => 'Imprimir'
            )
        );

        $this->loadView('template_parts/header', $this->dados);

    }

    public function index()
    {
        $produto_dao = new ProdutoDAO();
        $produto_dao::obter_conexao(new BancoDeDadosMySQL);

        $this->dados['lista'] = $produto_dao->todos("quantidade_minima < quantidade");

        $this->loadView('relatorios', $this->dados);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
