<?php

// Import StudentControl and Student Model classes
require_once('./controller/StudentControl.class.php');
require_once('./model/Student.class.php');

// StudentControl and Student Model objects
$student = new Student();
$control = new StudentControl();

// Remove unnecessary characters and backslashes, and prevent the insertion of special characters
function dataValidation($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// Check the server request method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Set the attribute values
	if (preg_match("/^[a-zA-Z' ]*$/", $_POST["nUsr"])) {
		$student->setName(dataValidation($_POST["nUsr"]));
	}

	if (filter_var($_POST["nEml"], FILTER_VALIDATE_EMAIL)) {
		$student->setEmail(dataValidation($_POST["nEml"]));
	}

	$student->setGender(dataValidation($_POST["gender"]));
	$student->setCourse(dataValidation($_POST["nRl"]));
	
	// Send to student view page if the create student method is true
	if ($control->create($student)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/student_view.php?email={$_GET["email"]}");
	} else {
		echo "<h2>Error</h2>";
	}
}


?>