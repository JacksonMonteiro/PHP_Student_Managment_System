<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/update_admin.css"/>
	<title>SGE - Atualizar Moderador</title>
</head>
<body>
	<main>
			<?php
			require_once("./controller/adminControl.class.php");
			$control = new adminControl();
			$data = $control->readOne($_GET["email"]);

			if ($data != null) {
				echo 
				"
					<form action='update_admin.php' method='POST'>
						<label for='username'>
							Nome de usuário: <input type='text' value='{$data['username']}' id='username' name='username'>
						</label>
						<br>
						<label for='email'>
							Email: <input type='email' value='{$data['email']}' id='email' name='email'>
						</label>
						<br>
						<label for='gender'>
							Sexo: <input type='text' value='{$data['gender']}' name='gender'>
						</label>
						<br>
						<label for='role'>
							Cargo: <input type='text' value='{$data['role']}' id='role' name='role'>
						</label>
						<br>
						<input type='submit' value='Atualizar'>
						<a href='./admin_view.php'>Voltar</a>
					</form>
				";
			}
			?>

	</main>
</body>
</html>