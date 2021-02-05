<?php 

if (isset($_POST["eml"]) && !empty($_POST["eml"]) && isset($_POST["pwd"]) && !empty($_POST["pwd"])) {

	require_once("controller/database/Connection.class.php");
	require_once("controller/AdminControl.class.php");

	$control = new AdminControl();

	$email = addslashes($_POST["eml"]);
	$password = addslashes($_POST["pwd"]);

	if ($control->login($email, $password) == true) {
		header("Location: http://localhost/PHP_Student_Managment_System/dashboard.php?email={$email}");
	} else {
		header("Location: http://localhost/PHP_Student_Managment_System/login_form.php");
	}
} else {
	header("Location: http://localhost/PHP_Student_Managment_System/login_form.php");
}

?>