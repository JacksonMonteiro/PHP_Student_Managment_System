<?php

// Student model class
class Student {
	// Attributes
	private $name;
	private $email;
	private $gender;
	private $course;

	// Getters
	public function getName() {
		return $this->name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getGender() {
		return $this->gender;
	}

	public function getCourse() {
		return $this->course;
	}

	// Setters
	public function setName($name) {
		$this->name = $name;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setGender($gender) {
		$this->gender = $gender;
	}

	public function setCourse($course) {
		$this->course = $course;
	}

}	

?>