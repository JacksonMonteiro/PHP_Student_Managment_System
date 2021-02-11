<?php

require_once("./controller/AdminControl.class.php");
require_once("./model/Admin.class.php");

$admin = new Admin();
$control = new AdminControl();

function dataValidation($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$admin->setUsername(dataValidation($_POST["username"]));
	$admin->setEmail(dataValidation($_GET["email"]));
	$admin->setGender(dataValidation($_POST["gender"]));
	$admin->setRole(dataValidation($_POST["role"]));

	if ($control->update($admin)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/dashboard.php?email={$admin->getEmail()}");
	} else {
		echo "<h2>Error</h2>";
	}
}

?>