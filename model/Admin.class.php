<?php 

class Admin {

	private $username;
	private $email;
	private $gender;
	private $role;
	private $password;

	// Getters

	function getUsername() {
		return $this->username;
	}

	function getEmail() {
		return $this->email;
	}

	function getGender() {
		return $this->gender;
	}

	function getRole() {
		return $this->role;
	}

	function getPassword() {
		return $this->password;
	}

	// Setters

	function setUsername($usr) {
		$this->username = $usr;
	}

	function setEmail($e) {
		$this->email = $e;
	}

	function setGender($g) {
		$this->gender = $g;
	}

	function setRole($r) {
		$this->role = $r;
	}

	function setPassword($p) {
		$this->password = $p;
	}
}

?>