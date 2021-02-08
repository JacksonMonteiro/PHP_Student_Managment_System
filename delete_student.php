<?php

require_once("./controller/StudentControl.class.php");
require_once("./model/Student.class.php");

$student = new Student();
$student->setEmail($_POST["email"]);
$email = $_GET["email"];

$control = new StudentControl();

if ($control->delete($student)) {
	header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$email}");
} else {
	echo "<h2>Error</h2>";
}

?>