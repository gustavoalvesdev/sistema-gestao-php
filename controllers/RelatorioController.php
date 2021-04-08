<?php 

class RelatorioController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->user = new User();

        if (! $this->user->checkLogin()) {
            header('Location: '.BASE_URL.'login');
            exit;
        }

        $data = array();

        $data['menu'] = array(
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

        $this->loadView('template_parts/header', $data);

    }

    public function index()
    {
        $data = array();

        $p = new Product();

        $data['list'] = $p->getLowQuantityProducts();

        $this->loadView('relatorio', $data);
    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
