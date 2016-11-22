<?php
namespace Models\Users;
//require_once 'Person.php';
//require_once 'DigitalUser.php';
use Models\Table as Table;
class Student extends Table implements \Iterator, Person{
    
    use DigitalUser;
    
    private $name;
    private $age;
    private $courses = array();
    private $position = 0;
    
    public static function getInstanceFromDb($id){
        
    }
    
    public function __construct($name, $age, $email, $courses=[]){
        parent::__construct();           
        
        $this->name=$name;
        $this->age=$age;
        $this->email=$email;
        $this->courses=$courses;
    }
    static function loadFromDb($id) {
        $instance = self::get($id);
        if ($instance){
            foreach ($instance as $key=>$value){
                if(strpos(key, "_")==false){
                $this->$key = $value;}
            }
        }
    }
    
    function __toString(){
        $courses=" ";
        foreach ($this->courses as $course){
            $courses.="<br>".$course;
        }
        return "Nome: ".$this->name."<br/>". " Eta: ". $this->age."<br/>". "EMail: ". $this->email."<br/>"."Corsi: ".$courses;
    }
    
    public function getCourses(){
        return $this->courses;
    }
    public function addCourse(Course $course){
        array_push($this->courses, $course);
    }
    public function resetCourses(){
        $this->courses = [];
    }
    
   
    //metodi dell'iterator
    public function key(){
        return $this->position;
    }

    public function current(){
        return $this->courses[$this->position];
    }

    public function next(){
        $this->position++;
    }

    public function rewind(){
        $this->position = 0;
    }

    public function valid(){
        return isset($this->courses[$this->position]) || array_key_exists($this->position, $this->courses);                   
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
        $this->age = age;
    }
    
 }
