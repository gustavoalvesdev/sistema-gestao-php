<?php 

class CidadeController extends Controller 
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
                'class' => 'link-home',
                'id' => '',
                'link' => BASE_URL,
                'text' => 'Início'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'produto',
                'text' => 'Configurações'
            ),
            array(
                'class' => '',
                'id' => '',
                'link' => BASE_URL.'categoria',
                'text' => 'Usuários'
            )
        );

        $this->loadView('template_parts/header', $data);
    }

    public function index()
    {
        $data = array();

        $c = new City();

        $s = '';

        if (! empty($_GET['busca'])) {

            $s = addslashes(trim($_GET['busca']));

        } 

        $data['list'] = $c->getCities($s);

        $this->loadView('cidade', $data);
    }

    public function add()
    {

        $data = array();

        $s = new State();
        $c = new City();

        $data['list'] = $s->getStates();

        if (! empty($_POST['name'])) {

            $name = addslashes(trim($_POST['name']));
            $state = addslashes($_POST['state']);

            $c->addCity($name, $state);

            header('Location: '.BASE_URL.'cidade');
            exit;

        }

        $this->loadView('cidade-add', $data);

    }

    public function __destruct()
    {
        $this->loadView('template_parts/footer');
    }
}
