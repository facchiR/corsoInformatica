<?php

namespace Models;
use Configs\Database as Database;
use \PDO;
/**
 * Table class to be extended by models defined database
 */
abstract class Table{
    
    private $conn = "";
    //private $database = "";
    private $user = "";
    private $password = "";
    //private $table = "";
    
    private static $instance = null;
    protected $id = 0;
    /**
     * Initialize all parameters required to connect
     * database and retrieve/manipulate info from/to table
     */
    function __construct($table){                 
        
        $this->conn = Database::CONNECT;
        $this->user = Database::USERNAME;
        //$this->database = $database;
        $this->password = Database::PASSWORD;
        $this->table = $table;
    }
    function get($id){
        self::$instance = new PDO ($this->conn, $this->user, $this->password);
        self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $stmt = self::$instance->prepare("SELECT * FROM $this->table WHERE id = :id LIMIT 1");
        if($stmt->execute([":id"=>$id])){
            if($result = $stmt->fetch()){
                return $result;
            } else {
                return null;
            }
        }
    }
    /**
     * Load an item with IdD from Db
     * @param type $id database primary key
     */
    abstract function loadFromDb($id);
    /**
     * Remove an utem with ID from Db
     * @param type $id database primary key
     */
    function removeFromDb($id){
        //attivo una connesione ed eseguo una cancellazione del valore della tabella
        // che ha come ID il valore richiesto
    }
}