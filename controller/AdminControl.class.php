<?php 

// Import the Connection and the Admin model files
require_once('controller/database/Connection.class.php');
require_once('model/Admin.class.php');

class AdminControl {
	// Create register on database
	public function create($obj) {
		try {
			$connection = new Connection("./controller/database/config.ini");
			$query = "INSERT INTO admin VALUES (:u, :e, :g, :r, :p);";
			$command = $connection->getPDO()->prepare($query);

			$usr = $obj->getUsername();
			$eml = $obj->getEmail();
			$gnd  = $obj->getGender();
			$rl = $obj->getRole();
			$pwd = $obj->getPassword();

			$command->bindParam("u", $usr);
			$command->bindParam("e", $eml);
			$command->bindParam("g", $gnd);
			$command->bindParam("r", $rl);
			$command->bindValue("p", sha1($pwd));


			if ($command->execute()) {
				$connection->closeConnection();
				return true;
			} else {
				$connection->closeConnection();
				return false;
			}

		} catch (PDOexception $e) {
			echo "Error: {$e->getMessage()}";
		}
	}

	public function login($email, $pass) {
		try {
			$connection = new Connection("./controller/database/config.ini");
			$command = $connection->getPDO()->prepare("SELECT * FROM admin WHERE email = :email AND password = :pass;");

			$e = $email;
			$p = sha1($pass);

			$command->bindParam("email", $e);
			$command->bindParam("pass", $p);
			
			if ($command->execute()) {
				$data = $command->fetch();
				if ($e === $data["email"] && $p === $data["password"]) {
					$connection->closeConnection();
					return true;
				}
			} else {
				$connection->closeConnection();
				return false;
			}
		} catch (PDOexception $e) {
			echo "Error: {$e->getMessage()}";
		}
 	}

 	public function read() {
 		try {
 			$connection = new Connection("./controller/database/config.ini");
 			$command = $connection->getPDO()->prepare("SELECT * FROM admin;");
 			if ($command->execute()) {
 				$data = $command->fetchAll(PDO::FETCH_CLASS, "Admin");
 				$connection->closeConnection();
 				return $data;
 			} else {
 				$connection->closeConnection();
 				return null;
 			}
 		} catch (PDOexception $e) {
 			echo "Error: ${$e->getMessage()}";
 		}
 	}
}

?>