<?php

namespace Models;
use Configs\Database;

/**
 * Table class to be extended by models defined database
 */
abstract class Table{
    private $conn = "";
    private $database = "";
    private $user = "";
    private $password = "";
    private $table = "";
    
    private $instance = null;
    protected $id = 0;
    /**
     * 
     */
    function __construct($conn, $user, $password, $table){                 
        
        $this->conn = Database::CONNECT;
        $this->user = Database::USERNAME;
        //$this->database = $database;
        $this->password = Database::PASSWORD;
        $this->table = $table;
    }
    function get($id){
        $this->instance = new \PDO ($this->conn, $this->user, $this->password);
        $stmt = $this->prepare("SELECT * FROM $this->table WHERE id = :id LIMIT 1");
        if($stmt->execute([":id"=>$id])){
            if($result = $stmt->fetch()){
                return $result;
            } else {
                return null;
            }
        }
    }
    abstract static function loadFromDb($id);
    function removeFromDb($id){
        //attivo una connesione ed eseguo una cancellazione del valore della tabella
        // che ha come ID il valore richiesto
    }
}