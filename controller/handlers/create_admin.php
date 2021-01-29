<?php

require_once('../AdminControl.class.php');
require_once('../../model/Admin.class.php');

$admin = new Admin();
$admin->setUsername($_POST["nUsr"]);
$admin->setEmail($_POST["nEml"]);
$admin->setGender($_POST["gender"]);
$admin->setRole($_POST["nRl"]);
$admin->setPassword($_POST["nPwd"]);

$control = new AdminControl();

if ($control->create($admin)) {
	header ("Location: http://localhost/git/PHP_Student_Managment_System/view/dashboard.php");
} else {
	echo "<h2>Error</h2>";
}

?>