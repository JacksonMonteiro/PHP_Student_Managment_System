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
	if (preg_match("/^[a-zA-Z' ]*$/")) {
		$admin->setUsername(dataValidation($_POST["username"]));
	}

	if (filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
		$admin->setEmail(dataValidation($_GET["email"]));
	}

	$admin->setGender(dataValidation($_POST["gender"]));
	$admin->setRole(dataValidation($_POST["role"]));

	// Send to dashboard page if the update admin method is true
	if ($control->update($admin)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/dashboard.php?email={$admin->getEmail()}");
	} else {
		echo "<h2>Error</h2>";
	}
}

?>