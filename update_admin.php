<?php

require_once("./controller/AdminControl.class.php");
require_once("./model/Admin.class.php");

$admin = new Admin();

$admin->setUsername($_POST["username"]);
$admin->setEmail($_GET["email"]);
$admin->setGender($_POST["gender"]);
$admin->setRole($_POST["role"]);

$control = new AdminControl();

if ($control->update($admin)) {
	header ("Location: http://localhost/PHP_Student_Managment_System/admin_view.php");
} else {
	echo "<h2>Error</h2>";
}

?>