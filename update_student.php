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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$student->setName(dataValidation($_POST["name"]));
	$student->setEmail(dataValidation($_GET["studentEmail"]));
	$student->setGender(dataValidation($_POST["gender"]));
	$student->setCourse(dataValidation($_POST["course"]));

	$admEmail = $_GET["email"];


	if ($control->update($student)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$admEmail}");
	} else {
		echo "<h2>Error</h2>";
}
}

?>