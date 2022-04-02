<?php

class Database
{
    protected $pdo;
    private $db = [     //  Futuramente utilizar variáveis de ambiente.
        "driver" => "mysql",
        "host" => "localhost",
        "name" => "my_database",
        "user" => "root",
        "pass" => ""
    ];
    private $msgErro = "";

    public function connection()
    {
        $driver = $this->db["driver"];
        $host = $this->db["host"];
        $name = $this->db["name"];
        $user = $this->db["user"];
        $pass = $this->db["pass"];     // Futuramente adicionar criptografia a senha.

        try {
            $connectionString = $driver . ":host=" . $host . ";dbname=" . $name;
            $this->setPdo(new PDO($connectionString, $user, $pass));
            return true;
        } catch (PDOException $err) {
            $this->setMsgErro("Erro: " . $err->getMessage());
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
    public function getPdo()
    {
        return $this->pdo;
    }
    private function setPdo(Object $pdo)
    {
        $this->pdo = $pdo;
    }
}
