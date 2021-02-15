<?php

// Import AdminControl and Admin Model classes
require_once("./controller/AdminControl.class.php");
require_once("./model/Admin.class.php");

// AdminControl and Admin Model objects
$admin = new Admin();
$control = new AdminControl();

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
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$admin->setEmail(dataValidation($_POST["email"]));
	}

	// Send to login form page if the delete admin method is true
	if ($control->delete($admin)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/login_form.php");
	} else {
		echo "<h2>Error</h2>";
	}
}


?>