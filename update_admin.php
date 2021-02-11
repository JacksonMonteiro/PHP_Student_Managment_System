<?php

require_once("./controller/AdminControl.class.php");
require_once("./model/Admin.class.php");

$admin = new Admin();
$control = new AdminControl();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$admin->setUsername($_POST["username"]);
	$admin->setEmail($_GET["email"]);
	$admin->setGender($_POST["gender"]);
	$admin->setRole($_POST["role"]);

	if ($control->update($admin)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/dashboard.php?email={$admin->getEmail()}");
	} else {
		echo "<h2>Error</h2>";
	}
}

?>