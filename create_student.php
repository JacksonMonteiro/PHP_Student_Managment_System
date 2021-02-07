<?php

require_once('./controller/StudentControl.class.php');
require_once('./model/Student.class.php');

$student = new Student();
$student->setName($_POST["nUsr"]);
$student->setEmail($_POST["nEml"]);
$student->setGender($_POST["gender"]);
$student->setCourse($_POST["nRl"]);

$control = new StudentControl();

if ($control->create($student)) {
	header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$_GET["email"]}");
} else {
	echo "<h2>Error</h2>";
}

?>