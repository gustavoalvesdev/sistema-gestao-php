<?php 

class User extends Model
{

    private $info;

    public function verifyUser($email, $pass)
    {
        $sql = 'SELECT * FROM users WHERE user_email = :email AND user_pass = :upass';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':upass', md5($pass));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        }

        return false;
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
