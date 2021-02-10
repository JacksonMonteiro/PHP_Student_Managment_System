<?php 

// Admin model class
class Admin {
	// Attributes
	private $username;
	private $email;
	private $gender;
	private $role;
	private $password;

	// Getters
	public function getUsername() {
		return $this->username;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getGender() {
		return $this->gender;
	}

	public function getRole() {
		return $this->role;
	}

	public function getPassword() {
		return $this->password;
	}

	// Setters
	public function setUsername($usr) {
		$this->username = $usr;
	}

	public function setEmail($e) {
		$this->email = $e;
	}

	public function setGender($g) {
		$this->gender = $g;
	}

	public function setRole($r) {
		$this->role = $r;
	}

	public function setPassword($p) {
		$this->password = $p;
	}
}

?>