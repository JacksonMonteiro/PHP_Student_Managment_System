<?php

require_once("./controller/StudentControl.class.php");
require_once("./model/Student.class.php");

$student = new Student();
$control = new StudentControl();

function dataValidation($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){ 
	$student->setEmail(dataValidation($_POST["email"]));
	$email = dataValidation($_GET["email"]);

	if ($control->delete($student)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$email}");
	} else {
		echo "<h2>Error</h2>";
	}
}
?>