<?php

require_once("./controller/StudentControl.class.php");
require_once("./model/Student.class.php");

$student = new Student();
$control = new StudentControl();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$student->setName($_POST["name"]);
	$student->setEmail($_GET["studentEmail"]);
	$student->setGender($_POST["gender"]);
	$student->setCourse($_POST["course"]);

	$admEmail = $_GET["email"];


	if ($control->update($student)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$admEmail}");
	} else {
		echo "<h2>Error</h2>";
}
}

?>