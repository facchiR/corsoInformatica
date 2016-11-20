<?php

namespace Users;

class School implements \Iterator {
    private $name;
    private $students = [];
    private $position = 0;
    
    public function __construct($name){
        $this->name = $name;
    }
    public function __toString(){
        $str = " ";
        foreach ($this->students as $student) {
            $str.="<br/>".$student;
        }
        return "scuola: $this->name<br/>studenti: $str";
    }
    public function addStudent(Student $stud){
        array_push($this->students, $stud);
    }
    public function getStudents(){
        return $this->students;
    }
    
    //metodi dell'iterator
    public function key(){
        return $this->position;
    }

    public function current(){
        return $this->students[$this->position];
    }

    public function next(){
        $this->position++;
    }

    public function rewind(){
        $this->position = 0;
    }

    public function valid(){
        return isset($this->students[$this->position]) || array_key_exists($this->position, $this->students);                   
    }
    
    
}
