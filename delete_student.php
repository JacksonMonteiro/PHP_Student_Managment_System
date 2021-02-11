<?php

require_once("./controller/StudentControl.class.php");
require_once("./model/Student.class.php");

$student = new Student();
$control = new StudentControl();

if ($_SERVER["REQUEST_METHOD"] === "POST"){ 
	$student->setEmail($_POST["email"]);
	$email = $_GET["email"];

	if ($control->delete($student)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$email}");
	} else {
		echo "<h2>Error</h2>";
	}
}
?>