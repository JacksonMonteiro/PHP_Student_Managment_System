<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<main>
		<form action="../controller/handlers/login.php" method="POST">
			<label for="email">
				Email: <br>
				<input type="text" id="email" name="eml" />
			</label> <br>
			<label for="password">
				Senha: <br>
				<input type="password" id="password" name="pwd" />
			</label>
			<br>
			<input type="submit" value="Entrar">
			<br>
			<a href="register_form.php">Registrar-se</a>
		</form>
	</main>
</body>
</html>