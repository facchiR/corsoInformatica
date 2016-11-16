<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class_name){
    require_once $class_name.'.php';
});
use Users\Student as Student;
use Users\Course as Course;
//use Users\DigitalUser as DigitalUser;
//require_once 'classes/Course.php';

echo "<h1>Hello world!</h1>";

$student1 = new Student("Donald Duck", 37, "gkgjh@lll");
$student2 = new Student("Mickey Mouse", 48, "gkgjh@lll");
$student3 = new Student("Daisy Duck", 34, "gkgjh@lll");

echo $student1;
echo "<br>";
echo $student2;
echo "<br>";
echo $student3;

$course1 = new Course("Cucina", "17.00");
$course2 = new Course("Cucito", "17.30");
$student3->addCourse($course1);
$student3->addCourse($course2);
echo '<br>';
echo $student3;
