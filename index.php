<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class_name){
    require_once $class_name.'.php';
});
use Models\Users\Student as Student;
use Models\Users\Course as Course;
use Models\Users\Teacher as Teacher;
use Models\Users\School as School;
//use Users\DigitalUser as DigitalUser;
//require_once 'classes/Course.php';

echo "<h1>Hello world!</h1>";

$student1 = new Student("Donald Duck", 37, "gkgjh@lll");
$student2 = new Student("Mickey Mouse", 48, "gkgjh@lll");
$student3 = new Student("Daisy Duck", 34, "gkgjh@lll");

//echo $student1."<br/>".$student2."<br/>".$student3."<br/>";

$course1 = new Course("Cucina", 100);
$course2 = new Course("Cucito", 150 );

//echo $course1."<br/>".$course2."<br/>";

$student3->addCourse($course1);
$student3->addCourse($course2);
$student1->addCourse($course1);

//echo $student1."<br/>".$student3."<br/>";

$school1 = new School("Accademia");
$school1 ->addStudent($student1);
$school1 ->addStudent($student2);
$school1 ->addStudent($student3);

$course3 = new Course("fotografia", 100);
$teacher1 = new Teacher("Steve McCurry", 67, "ybdyex@hhh", $course3, $school1);
$student1->addCourse($course3);
//echo $school1."<br/>";
echo $teacher1."<br/>";