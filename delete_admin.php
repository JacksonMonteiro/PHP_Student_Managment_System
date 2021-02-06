<?php

require_once("./controller/AdminControl.class.php");
require_once("./model/Admin.class.php");

$admin = new Admin();
$admin->setEmail($_POST["email"]);
$email = $_GET["email"];

$control = new AdminControl();

if ($control->delete($admin)) {
	header ("Location: http://localhost/PHP_Student_Managment_System/login_form.php");
} else {
	echo "<h2>Error</h2>";
}

?>