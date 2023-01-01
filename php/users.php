<?php
require_once "./php/database.php";
class Users extends Database
{
    private $msgErro = "";

    public function validateInputs(String $name, String $pass)
    {
        $p_name = preg_replace("/[^[:alnum:]_]/", '', $name);
        $p_pass = preg_replace('/[^[:alnum:]_]/', '', $pass);

        if ($p_name == $name) {
            if ($p_pass == $pass) {
                return true;
            } else {
                $this->setMsgErro("Password characters are invalid.");
                return false;
            }
        } else {
            $this->setMsgErro("User characters are invalid.");
            return false;
        }
    }

    public function insertUser(String $name, String $pass)
    {
        if (Database::class) {
            $sql = Database::getPdo()->prepare("SELECT * FROM `users` WHERE `name` = :n;");
            $sql->bindValue(":n", $name);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $this->setMsgErro("Username already used.");
                return false;
            } else {
                $sql2 = Database::getPdo()->prepare("INSERT INTO `users`(`name`, `pass`) VALUES(:n, :p);");
                $sql2->bindValue(":n", $name);
                $sql2->bindValue(":p", md5($pass));
                $sql2->execute();

                if ($sql2->rowCount() > 0) {
                    return true;
                } else {
                    $this->setMsgErro("A system error has occurred, please try again later.");
                    return false;
                }
            }
        } else {
            $this->setMsgErro("A system error has occurred, please try again later.");
            return false;
        }
    }

    public function authenticateUser(String $name, String $pass)
    {
        if (Database::class) {
            $sql = Database::getPdo()->prepare("SELECT * FROM `users` WHERE `name` = :n ;");
            $sql->bindValue(":n", $name);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $data_fetch = $sql->fetch(2);
                if ($data_fetch["pass"] == md5($pass)) {
                    //  Criar as Sessions.
                    return true;
                } else {
                    $this->setMsgErro("Incorrect password.");
                    return false;
                }
            } else {
                $this->setMsgErro("User does not exist.");
                return false;
            }
        } else {
            $this->setMsgErro("A system error has occurred, please try again later.");
            return false;
        }
    }
    public function getMsgErro()
    {
        return $this->msgErro;
    }
    private function setMsgErro(String $msg)
    {
        $this->msgErro = $msg;
    }
}
