<?php

// Import the Connection class and the Student model files
require_once('./controller/database/Connection.class.php');
require_once('./model/Student.class.php');

// Global variable
$connection = new Connection('./controller/database/config.ini');

class StudentControl {

	// Create a new student register in database
	public function create($obj) {
		try {
			if (get_class($obj) === "Student") {
				global $connection;
				$command = $connection->getPDO()->prepare("INSERT INTO student VALUES (:name, :email, :gender, :course);");
				
				$name = $obj->getName();
				$email = $obj->getEmail();
				$gender = $obj->getGender();
				$course = $obj->getCourse();

				$command->bindParam("name", $name);
				$command->bindParam("email", $email);
				$command->bindParam("gender", $gender);
				$command->bindParam("course", $course);

				if ($command->execute()) {
					$connection->closeConnection();
					return true;
				} else {
					$connection->closeConnection();
					return false;
				}
			}
		} catch (PDOException $e) {
			echo "Error: {$e->getMessage()}";
		}
	}

	// Select and return all student registers from database
	public function read() {
		try {
			global $connection;
			$command = $connection->getPDO()->prepare("SELECT * FROM student");
			if ($command->execute()) {
				$data = $command->fetchAll(PDO::FETCH_CLASS, "Student");
				$connection->closeConnection();
				return $data;
			} else {
				$connection->closeConnection();
				return null;
			}
		} catch (PDOException $e) {
			echo "Error: {$e->getMessage()}";
		}
	}

	// Return only one student register from database
	public function readOne($email) {
		try {
			global $connection;
			$command = $connection->getPDO()->prepare("SELECT * FROM student WHERE email = :email;");
			$command->bindParam("email", $email);
			if ($command->execute()) {
				$data = $command->fetch();
				$connection->closeConnection();
				return $data;
			} else {
				$connection->closeConnection();
				return null;
			}
		} catch (PDOException $e) {
			echo "Error: {$e->getMessage()}";
		}
	}

	// Update student register on database
	public function update($obj) {
		try {
			if (get_class($obj) === "Student") {
				global $connection;
				$command = $connection->getPDO()->prepare("UPDATE student SET name = :name, gender = :gender, course = :course WHERE email = :email");

				$name = $obj->getName();
				$gender = $obj->getGender();
				$course = $obj->getCourse();
				$email = $obj->getEmail();

				$command->bindParam("name", $name);
				$command->bindParam("gender", $gender);
				$command->bindParam("course", $course);
				$command->bindParam("email", $email);

				if ($command->execute()) {
					$connection->closeConnection();
					return true;
				} else {
					$connection->closeConnection();
					return false;
				}
			}
		} catch (PDOException $e) {
			echo "Error: {$e->getMessage()}";
		}
	}

	// Delete one student register from database
	public function delete($obj) {
		try {
			if (get_class($obj) === "Student") {
				global $connection;
				$command = $connection->getPDO()->prepare("DELETE FROM student WHERE email = :email;");

				$email = $obj->getEmail();
				$command->bindParam("email", $email);

				if ($command->execute()) {
					$connection->closeConnection();
					return true;
				} else {
					$connection->closeConnection();
					return false;
				}
			}
		} catch (PDOException $e) {
			echo "Error: {$e->getMessage()}";
		}
	}
}

?>