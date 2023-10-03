<?php

class Database
{
    private $host = 'db';
    private $db_name = 'php_docker';
    private $user = 'php_docker';
    private $password = 'password';
    // private $port = '8080';

    private $db_connection;
    private $statement;

    public function __construct()
    {
        $this->db_connection = new mysqli($this->host, $this->user, $this->password, $this->db_name);
    }

    public function query($query)
    {
        $this->statement = $this->db_connection->prepare($query);
        if (!$this->statement) {
            // Add error handling here, such as logging the error message
            die("Error in query: " . $this->db_connection->error);
        }
    }

    public function bind($arrParam, $value, $type = null)
    {
        for ($i = 0; $i < count($arrParam); $i++) {
            $arrParam[$i] = $value;
            if (is_null($type)) {
                if (is_int($value)) {
                    $type = 'i';
                } else if (is_bool($value)) {
                    $type = 'b';
                } else if (is_string($value)) {
                    $type = 's';
                } else {
                    $type = 'd';
                }
            }
        }

        $this->statement->bind_param($type, $arrParam[0]);
    }

    public function execute()
    {
        $this->statement->execute();
    }

    public function fetch()
    {
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }
    
    public function lastInsertID()
    {
        return $this->db_connection->lastInsertId();

    }
}