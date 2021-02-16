<?php 
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./view/css/login.css">
	<title>SGE - Login</title>
</head>
<body>
	<div class="orange_vector"></div>
	<div class="white_vector"></div>
	<div class="green_vector"></div>

	<main>
		<form action="login.php" method="POST">
			<h1>Login</h1>
			<label for="email">
				Email: <br>
				<input type="text" id="email" name="eml" placeholder="email@sge.com" />
			</label> <br>
			<label for="password">
				Senha: <br>
				<input type="password" id="password" name="pwd" />
			</label>
			<br>
			<input type="submit" value="Entrar" class="login-btn">
			<br>
			<a href="register_form.php" class="register-btn">Cadastrar-se</a>
			<a href="index.php" class="exit-btn">Sair</a>
		</form>
	</main>
</body>
</html>