<?php

require_once("./controller/AdminControl.class.php");
require_once("./model/Admin.class.php");

$admin = new Admin();
$control = new AdminControl();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$admin->setEmail($_POST["email"]);

	if ($control->delete($admin)) {
		header ("Location: http://localhost/PHP_Student_Managment_System/login_form.php");
	} else {
		echo "<h2>Error</h2>";
	}
}


?>