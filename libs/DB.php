<?php

class DB extends PDO {
    private $hostname = 'localhost';
    private $database = 'productosdb1';
    private $username = 'root';
    private $password = '';
    private $pdo;
    private $sQuery;
    private $bConnected = false;
    private $parameters;

    public function __construct() {
        $dns = 'mysql:dbname=' . $this->database . 
                ';host=' . $this->hostname;
        
        parent::__construct($dns, $this->username, $this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));                          

    }


/*     private function connection() {
        $dns = 'mysql:dbname' . $this->database . 
                ';host=' . $this->hostname;
        try {
            $this->pdo = new PDO($dns, $this->username, $this->password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            return $this->pdo;
        } catch(Exception $e){
            echo 'Error: ' . $e->getMessage();
        }

    } */

    public function CloseConnection() {
        $this->pdo = null;
    }

    private function Init($query, $parameters = "") {
        if( !$this->bConnected) { $this->connect();}
        try {
            $this->sQuery = $this->pdo->prepare($query);

            $this->bindMore($parameters);
            if(!empty($this->parameters)) {
                foreach ($this->parameters as $param) {
                    $parameters = explode("\7xF", $param);
                    $this->sQuery->bindParam($parmeters[0], $parameters[1]);
                }
            }
            $this->success = $this->sQuery->execute();
        } catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $this->parameters = array();
    }

    public function bind($para, $value) {
        $this->parameters[sizeof($this->parameters)] = ":" . $para . "\x7f" . utf8_encode($value);
    }

    public function bindMore($parray) {
        if(empty($this->parameters) && is_array($parray)) {
            $columns = array_keys($parray);

            foreach( $columns as $i => &$colum) {
                $this->bind($column, $parray[$column]);
            }
        }
    }
}


?>