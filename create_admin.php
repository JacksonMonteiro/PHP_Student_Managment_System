<?php

// Import AdminControl and Admin Model classes
require_once('./controller/AdminControl.class.php');
require_once('./model/Admin.class.php');

// AdminControl and Admin Model objects
$admin = new Admin();
$control = new AdminControl();

// Remove unnecessary characters and backslashes, and prevent the insertion of special characters
function dataValidation($data) {
	$data = trim($data); // Remove unnecessary characters 
	$data = stripslashes($data); // Remove backslashes ('\')
	$data = htmlspecialchars($data); // prevent the special characters input
	return $data;
}

// Check the server request method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Set the attribute values
	$admin->setUsername(dataValidation($_POST["nUsr"]));
	$admin->setEmail(dataValidation($_POST["nEml"]));
	$admin->setGender(dataValidation($_POST["gender"]));
	$admin->setRole(dataValidation($_POST["nRl"]));
	$admin->setPassword(dataValidation($_POST["nPwd"]));

	// Send to login form page if the create admin method is true
	if ($control->create($admin)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/login_form.php");
	} 
}

?>