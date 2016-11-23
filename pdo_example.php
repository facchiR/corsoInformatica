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
        PDO::FETCH_ASSOC); 
        //PDO::FETCH_BOTH);
        //PDO::FETCH_NUM);

echo "<h3>Esempio di semplice query PDO</h3>";
$result = $connessione->query("SELECT * FROM student");
foreach($result as $riga){
    foreach ($riga as $key => $value){
        echo "$key : $value<br>";
    }
}

//echo json_encode($result->fetchAll());

$result = $connessione->prepare("SELECT * FROM student WHERE id = :id LIMIT 1");
$id = 2;
$result->execute(array(":id" => $id));

//echo json_encode($result->fetch());

echo "<hr><h3>Esempio di query con prepared statement filtrando per due valori in WHERE</h3>";

$result = $connessione->prepare("SELECT * FROM student WHERE age > :age AND email LIKE :email");
$age = 50;
$email = "%@usa%";
$result->execute(array(":age"=>$age, ":email"=>$email));
foreach ($result as $riga){
    foreach($riga as $key => $value){
        echo "$key : $value<br/>";
    }
}
echo "<hr><h3>Esempio di query con valori ottenuti dal join di 2 tabelle</h3>";
$result = $connessione->query("SELECT student.name 'student.name', school.name, school.address FROM student INNER JOIN school ON student.school_id=school.id;");
//echo json_encode($result->fetch())."<br/>";

$result = $connessione->query("SELECT student.id 'student.id', student.name 'student.name', student.age 'student.age', student.email 'student.email', student.school_id 'student.school_id',school.id 'school.id' ,school.name 'school.name', school.address 'school.address' FROM student INNER JOIN school ON student.school_id=school.id; ");
//echo json_encode($result->fetch());
foreach ($result as $riga){
    foreach ($riga as $key => $value){
        $pre = substr($key, 0, strpos($key, '.'));
        $pos = substr($key, strpos($key, '.')+1, strlen($key)-1); 
        if($pre == "student"){
            $student = isset($student)?$student:[];
            $student[$pos] = $value;
        }else if($pre == "school"){
            $school = isset($school)?$school:[];
            $school[$pos] = $value;
        }
    }
}
        echo var_dump($student);
        echo var_dump($school);
        $st = new Models\Users\Student($student['name'], $student['age'], $student['email'] );
        $sc = new Models\Users\School($school['name'], $school['address']);
        echo "<br/><h4>$sc $st</h4>";