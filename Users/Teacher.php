<?php
namespace Users;

class Teacher extends Worker {
    use DigitalUser;
    
    private $name;
    private $age;
    private $course;
    public function __construct($name, $age, $email, $course=null){
        $this->name=$name; 
        $this->age=$age; 
        $this->email=$email; 
        $this->course=$course; 
    }
    public function __toString(){
        
        //foreach()
        return "Nome: $this->name Età: $this->age EMail: $this->email $this->course ";    
    }
    /*
    $courses = " ";
        foreach($this->courses as $course){
            $courses .= '<br>'.$course;
        }*/
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
    
}
