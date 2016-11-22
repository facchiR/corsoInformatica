<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class_name){
    require_once $class_name.'.php';
});

use Users\Student as Student;

try{
    $connessione = 
        new PDO(
                "mysql:dbname=corso_informatica; host=127.0.0.1",
                "admin", "admin");
} catch(PDOException $e) {
    die ('Connection failed: '.$e->getMessage());
}

$connessione->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC); //PDO::FETCH_NUM

$result = $connessione->query("SELECT * FROM student");

//echo json_encode($result->fetchAll());

$result = $connessione->prepare("SELECT * FROM student WHERE id = :id LIMIT 1");
$id = 2;
$result->execute(array(":id" => $id));
echo json_encode($result->fetch());