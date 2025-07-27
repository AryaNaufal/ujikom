<?php

namespace App;

use PDO;
use PDOException;

class DB
{
    static private $PDOInstance;
    private $host = "localhost";
    private $port = "3306";
    private $user = "root";
    private $pass = "";
    private $db = "pengadaan";

    public function __construct()
    {
        if (!self::$PDOInstance) {
            try {
                self::$PDOInstance = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db", $this->user, $this->pass);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }

    public function getPDO()
    {
        return self::$PDOInstance;
    }

    public function prepare($sql)
    {
        return self::$PDOInstance->prepare($sql);
    }

    public function errorInfo()
    {
        return self::$PDOInstance->errorInfo();
    }

    public function squery($statement, $array_condition)
    {
        $data = array();
        $PDOStatement = self::$PDOInstance->prepare($statement);
        $result = $PDOStatement->execute($array_condition);
        if ($result !== false) {
            $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function squery_single($statement, $array_condition)
    {
        $data = array();
        $PDOStatement = self::$PDOInstance->prepare($statement);
        $result = $PDOStatement->execute($array_condition);
        if ($result !== false) {
            $data = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
