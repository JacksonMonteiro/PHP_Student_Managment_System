<?php

require_once("./controller/StudentControl.class.php");
require_once("./model/Student.class.php");

$student = new Student();

$student->setName($_POST["name"]);
$student->setEmail($_GET["studentEmail"]);
$student->setGender($_POST["gender"]);
$student->setCourse($_POST["course"]);

$admEmail = $_GET["email"];

$control = new StudentControl();

if ($control->update($student)) {
	header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$admEmail}");
} else {
	echo "<h2>Error</h2>";
}

?>