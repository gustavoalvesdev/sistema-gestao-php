<?php 

namespace Models;
use Core\Model;
use Database\Database;

class User
{

    private \PDO $db;

    private $id;
    private $userNumber;
    private $userEmail;
    private $userPass;
    private $userToken;
    private $companyId;
    private $info;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /* GETTERS AND SETTERS */

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUserNumber()
    {
        return $this->userNumber;
    }

    public function setUserNumber($userNumber)
    {
        $this->userNumber = $userNumber;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function getUserPass()
    {
        return $this->userPass;
    }

    public function setUserPass($userPass)
    {
        $this->userPass = $userPass;
    }

    public function getUserToken()
    {
        return $this->userToken;
    }

    public function setUserToken($userToken)
    {
        $this->userToken = $userToken;
    }

    public function getCompanyId()
    {
        return $this->companyId;
    }

    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /* DB METHODS */
    public function verifyUser($email, $pass)
    {
        $sql = 'SELECT * FROM users WHERE user_email = :email AND user_pass = :upass';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email',     $email  );
        $sql->bindValue(':upass', md5($pass  ));
        $sql->execute();

        return $sql->rowCount() > 0;
    }

    public function createToken($email)
    {
        $token = md5(time().rand(0,9999).time().rand(0,9999));

        $sql = 'UPDATE users SET user_token = :token WHERE user_email = :email';
        $sql = $this->db->prepare($sql);

        $sql->bindValue(':token', $token);
        $sql->bindValue(':email', $email);

        $sql->execute();

        return $token;

    }

    public function checkLogin()
    {

        if (! empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $sql = 'SELECT * FROM users WHERE user_token = :token';
            $sql = $this->db->prepare($sql);

            $sql->bindValue(':token', $token);

            $sql->execute();

            if ($sql->rowCount() > 0) {

                $this->info = $sql->fetch();

                return true;
            }

            

        }

        return false;

    }
}
