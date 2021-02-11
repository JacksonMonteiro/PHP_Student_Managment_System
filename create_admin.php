<?php

require_once('./controller/AdminControl.class.php');
require_once('./model/Admin.class.php');

$admin = new Admin();
$control = new AdminControl();

function dataValidation($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$admin->setUsername(dataValidation($_POST["nUsr"]));
	$admin->setEmail(dataValidation($_POST["nEml"]));
	$admin->setGender(dataValidation($_POST["gender"]));
	$admin->setRole(dataValidation($_POST["nRl"]));
	$admin->setPassword(dataValidation($_POST["nPwd"]));

	if ($control->create($admin)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/login_form.php");
	} else {
		echo "<h2>Error</h2>";
	}
}

?>