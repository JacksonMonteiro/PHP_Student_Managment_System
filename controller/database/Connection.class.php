<?php

// Class used to initializes the connections on database 
class Connection {

	//Attributes
	private $usr;
	private $pwd;
	private $server;
	private $db;
	private $driver;
	private $pdo;


	public function __construct($file) {
		try {
			if (file_exists($file)) {
				// initializes the configuration file
				$config = parse_ini_file($file);

				// set the attribute values
				$this->usr = $config["user"];
				$this->pwd = $config["password"];
				$this->server = $config["host"];
				$this->db = $config["database"];
				$this->driver = $config["driver"];

				// Check the database drive
				switch($this->driver) {
					case "mysql":
						// begin the connection with database using pdo
						$this->pdo = new PDO("{$this->driver}:host={$this->server};dbname={$this->db}", $this->usr, $this->pwd);

						// set the PDO error mode to exception
						$this->getPDO()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						break;
					
					// End's database connection if DMBS are imcompatible with the system
					default:
						die("</script> alert('DBMS Incompatible with the system'); </script>");
				}
			} else {
				// Close connection if doesn't exists configuration file
				die("<script>alert('Configuration file not founded')</script>");
			}
		// Exceptions
		} catch (PDOException $e) {
			$error = addslashes($e->getMessage());
			echo "<script>alert('Error to connect database {$error}')</script>";
		} catch (exception $e) {
			echo "<script>Error to proccess file</script>";
		}
	}

	// get pdo statement
	function getPDO() {
		return $this->pdo;
	}


	// End's database connection
	function closeConnection() {
		$this->pdo = null;
	}
}

?>