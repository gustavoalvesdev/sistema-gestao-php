<?php 

namespace DAO;

use BancoDeDados\Interfaces\InterfaceDeBancoDeDados;
use Models\Usuario;
use PDO;

class UsuarioDAO 
{

    private static PDO $conexaoComOBanco;

    public static function obter_conexao(InterfaceDeBancoDeDados $interfaceDeBancoDeDados): void
    {
        self::$conexaoComOBanco = $interfaceDeBancoDeDados::obter_instancia();
    }

    public function verificarUsuario(Usuario $usuario): bool
    {
        $sql = 'SELECT * FROM usuarios WHERE email = :email AND senha = :senha';
        $sql = self::$conexaoComOBanco->prepare($sql);
        $sql->bindValue(':email', $usuario->email);
        $sql->bindValue(':senha', md5($usuario->senha));
        $sql->execute();

        return $sql->rowCount() > 0;
    }

    public function criarToken(Usuario $usuario): string
    {
        $usuario->token = md5(time().rand(0,9999).time().rand(0,9999));

        $sql = 'UPDATE usuarios SET token = :token WHERE email = :email';
        $sql = self::$conexaoComOBanco->prepare($sql);

        $sql->bindValue(':token', $usuario->token);
        $sql->bindValue(':email', $usuario->email);

        $sql->execute();

        return $usuario->token;

    }

    public function verificarLogin(Usuario $usuario): bool
    {
        if (! empty($_SESSION['token'])) {
            $usuario->token = $_SESSION['token'];

            $sql = 'SELECT * FROM usuarios WHERE token = :token';
            $sql = self::$conexaoComOBanco->prepare($sql);

            $sql->bindValue(':token', $usuario->token);

            $sql->execute();

            return $sql->rowCount() > 0;

        }

        return false;

    }
    
    public function obterInformacoesDoUsuario(Usuario $usuario) {
        
        $informacoesDoUsuario = [];

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = md5(:senha)";

        $sql = self::$conexaoComOBanco->prepare($sql);
        $sql->bindValue(':email', $usuario->email);
        $sql->bindValue(':senha', $usuario->senha);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $informacoesDoUsuario = $sql->fetch();
        }

        return $informacoesDoUsuario;
    }

}



    