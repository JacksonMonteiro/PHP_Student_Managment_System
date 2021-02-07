<?php

require_once('./controller/database/Connection.class.php');
require_once('./model/Student.class.php');

class StudentControl {

	public function create($obj) {
		try {
			if (get_class($obj) == "Student") {
				$connection = new Connection('./controller/database/config.ini');
				$query = "INSERT INTO student VALUES (:name, :email, :gender, :course);";
				$command = $connection->getPDO()->prepare($query);
				
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

	public function read() {
		try {
			$connection = new Connection('./controller/database/config.ini');
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
}

?>