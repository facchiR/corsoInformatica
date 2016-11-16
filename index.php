<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'classes/Student.php';

echo "<h1>Hello world!</h1>";

$student1 = new Student("Donald Duck", 37, "gkgjh@lll");
$student2 = new Student("Mickey Mouse", 48, "gkgjh@lll");
$student3 = new Student("Daisy Duck", 34, "gkgjh@lll");

echo $student1;
echo "<br>";
echo $student2;
echo "<br>";
echo $student3;
