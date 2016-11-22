<?php

namespace Models\Users;

use \Iterator as It;

class Teacher extends Worker implements It {
    
    use DigitalUser;
    
    private $name;
    private $age;
    private $course;
    private $company;
    private $school;
    private $position = 0;
    
    public function __construct($name, $age, $email, $course=null, $school=null, $company=null){
        $this->name=$name; 
        $this->age=$age; 
        $this->email=$email; 
        $this->course=$course; 
        $this->school=$school; 
        $this->company=$company; 
    }
    public function __toString(){
        $st = " ";
        foreach($this as $student){
            $st.="<br/>".$student;
        }
        return "Nome: ".$this->name."<br/>"."Età: ".$this->age."<br/>"."EMail: ".$this->email
                ."<br/>"."Corsi: ".$this->course."<br/>"."Studenti: ".$st;    
    }
    

    public function getCourse(){
        return $this->course;
    }
    public function setCourse(Course $course){
        $this->course = $course;
    }
    public function getSchool(){
        return $this->school;
    }
    public function setSchool(School $school){
        $this->school = $school;
    }
    
//metodi dell'iterator
    public function key(){
        return $this->position;
    }

    public function current(){
        return $this->getStudents()[$this->position];
    }

    public function next(){
        $this->position++;
    }

    public function rewind(){
        $this->position = 0;
    }

    public function valid(){
        return isset($this->getStudents()[$this->position]) || array_key_exists($this->position, $this->getStudents());                   
    }
    
    //metodi dell'interfaccia
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        $this->age = $age;
    }
    public function getStudents(){
        $studs = [];
        foreach ($this->school as $student) {
            foreach ($student as $course) {
                if($course === $this->course){
                    array_push($studs, $student);
                }
            }            
        }
        return $studs;
    }
    
}
