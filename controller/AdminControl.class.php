<?php 

// Import the Connection class and the Admin model files
require_once('controller/database/Connection.class.php');
require_once('model/Admin.class.php');

//Global variable		
$connection = new Connection("./controller/database/config.ini");

class AdminControl {
	// Create register on database
	public function create($obj) {
		try {
			if (get_class($obj) === "Admin") {
				global $connection;
				$command = $connection->getPDO()->prepare("INSERT INTO admin VALUES (:u, :e, :g, :r, :p);");

				$usr = $obj->getUsername();
				$eml = $obj->getEmail();
				$gnd  = $obj->getGender();
				$rl = $obj->getRole();
				$pwd = $obj->getPassword();

				$command->bindParam("u", $usr);
				$command->bindParam("e", $eml);
				$command->bindParam("g", $gnd);
				$command->bindParam("r", $rl);
				$command->bindParam("p", sha1($pwd));


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

	// Login action using email and password
	public function login($email, $pass) {
		try {
			global $connection;
			$command = $connection->getPDO()->prepare("SELECT * FROM admin WHERE email = :email AND password = :pass;");

			$e = $email;
			$p = sha1($pass);

			$command->bindParam("email", $e);
			$command->bindParam("pass", $p);
			
			if ($command->execute()) {
				$data = $command->fetch();
				if ($e === $data["email"] and $p === $data["password"]) {
					$connection->closeConnection();
					return true;
				}
			} else {
				$connection->closeConnection();
				return false;
			}
		} catch (PDOException $e) {
			echo "Error: {$e->getMessage()}";
		}
 	}

 	// Read action to collect all data from admins table
 	public function read() {
 		try {
 			global $connection;
 			$command = $connection->getPDO()->prepare("SELECT * FROM admin;");
 			if ($command->execute()) {
 				$data = $command->fetchAll(PDO::FETCH_CLASS, "Admin");
 				$connection->closeConnection();
 				return $data;
 			} else {
 				$connection->closeConnection();
 				return null;
 			}
 		} catch (PDOException $e) {
 			echo "Error: ${$e->getMessage()}";
 		}
 	}

 	// Select One action to collect only one register of admins table
 	public function readOne($email) {
 		try {
 			$connection = new Connection('./controller/database/config.ini');
 			$command = $connection->getPDO()->prepare("SELECT * FROM admin WHERE email = :email;");
 			$e = $email;
 			$command->bindParam("email", $e);
 			if ($command->execute()) {
 				$data = $command->fetch();
 				$connection->closeConnection();
 				return $data;
 			} else {
 				$connection->closeConnection();
 				return null;
 			}
 		} catch (PDOException $e) {
 			echo "Error {$e->getMessage()}";
 		}
 	}

 	// Update data from one specific register of admins table
 	public function update($obj) {
 		try {
 			if (get_class($obj) === "Admin") {
 				global $connection;
	 			$command = $connection->getPDO()->prepare("UPDATE admin SET username=:u, gender=:g, role=:r WHERE email=:e;");

	 			$u = $obj->getUsername();
	 			$e = $obj->getEmail();
	 			$g = $obj->getGender();
	 			$r = $obj->getRole();


	 			$command->bindParam("u", $u);
				$command->bindParam("e", $e);
	 			$command->bindParam("g", $g);
				$command->bindParam("r", $r);

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

 	// Delete one admin register from table
 	public function delete($obj) {
 		try {
 			if (get_class($obj) === "Admin") {
 				global $connection;
	 			$command = $connection->getPDO()->prepare("DELETE FROM admin WHERE email = :email;");

	 			$e = $obj->getEmail();
	 			$command->bindParam("email", $e);

	 			if ($command->execute()) {
	 				$connection->closeConnection();
	 				return true;
	 			} else {
	 				$connection->closeConnection();
	 				return false;
	 			}
 			}
 		} catch (PDOException $e) {
 			echo "Error: ${$e->getMessage()}";
 		}
 	}
}

?>