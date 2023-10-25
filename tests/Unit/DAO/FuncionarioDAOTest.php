<?php 

declare(strict_types=1);

namespace Tests\Unit\DAO;

use DAO\FuncionarioDAO;
use Database\Database;
use Models\Funcionario;
use PHPUnit\Framework\TestCase;

class FuncionarioDAOTest extends TestCase
{
    public function test_if_funcionario_is_inserted_successfylly_in_the_database(): void
    {
        $f = new Funcionario();

        $f->setNome('Maria da Silva Santos');
        $f->setRg('12.123.123-1');
        $f->setCpf('123.123.123-12');
        $f->setEmail('maria@santos.com');
        $f->setCelular('(00) 11111-1111');
        $f->setTelefone('(00) 1111-1111');
        $f->setSenha('123');
        $f->setCargo('Costureira');
        $f->setNivelAcesso(1);
        $f->setCep('00000-000');
        $f->setEndereco('Rua das Flores');
        $f->setNumero('18');
        $f->setBairro('Bairro das Flores');
        $f->setCidade('Cidade das Flores');
        $f->setComplemento('Na rua da chácara, perto do bosque');
        $f->setEstado('MS');

        // Conexão ao banco de dados, porque não funciona com a conexão principal
        $connection = new \PDO('mysql:host=localhost;dbname=estoque', 'root', '');

        $fd = new FuncionarioDAO($connection);

        $this->assertTrue($fd->add($f));
    }

}
