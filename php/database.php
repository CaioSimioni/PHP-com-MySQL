<?php

/**
 * Database é utilizado para facilitar a implementação de Banco de Dados
 * utilizando o PDO para acessar o banco.
 * 
 * @author Caio.Simioni
 * @version 1.0
 */
class Database
{
    /** @var object $pdo Guarda o objeto da classe PDO.*/
    protected $pdo;
    /** @var string $msgError Qualquer tipo de Exception. */
    private $msgError;
    /** @var array ["driver", "host", "name", "user", "pass"]*/
    private $database = [
        "driver" => "mysql",
        "host" => "localhost",
        "name" => "my_database",
        "user" => "root",
        "pass" => ""
    ];
    /** @var bool Diz se a conexão com o Banco está True ou False*/
    private $status;

    /**
     * Cria a conexão com o Banco de Dados.
     * 
     * @return bool Se precisar use o mêtodo getStatus() para revalidar.
     * @throws \PDOException
     */
    public function __construct()
    {
        $driver = $this->database["driver"];
        $host = $this->database["host"];
        $name = $this->database["name"];
        $user = $this->database["user"];
        $pass = $this->database["pass"];

        try {
            $connectionString = $driver . ":host=" . $host . ";dbname=" . $name;
            $this->setPdo(new PDO($connectionString, $user, $pass));
            $this->setStatus(true);
            return $this->getStatus();
        } catch (PDOException $err) {
            $this->setMsgError("Erro: " . $err->getMessage());
            $this->setStatus(false);
            return $this->getStatus();
        }
    }

    /** @return string */
    public function getMsgError()
    {
        return $this->msgError;
    }
    private function setMsgError(String $msg)
    {
        $this->msgError = $msg;
    }
    /**
     * Retorna o Objeto da classe PDO. Que representa a conexão com o Banco de Dados.
     *  @return object 
     */
    protected function getPdo()
    {
        return $this->pdo;
    }
    private function setPdo(Object $pdo)
    {
        $this->pdo = $pdo;
    }
    private function setStatus(Bool $status)
    {
        $this->status = $status;
    }
    /**
     * Retorna o status da conexão
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }
}
