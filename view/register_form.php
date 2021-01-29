<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<main>
		<form action="../controller/handlers/create_admin.php" method="POST">
			<label for="newUsername">
				Nome de usuário: <br>
				<input type="text" id="newUsername" name="nUsr" required>
			</label>
			<br>
			<label for="newEmail">
				Email: <br>
				<input type="email" id="newEmail" name="nEml" required>
			</label>
            <br>
            <div>
            	Sexo:
            	<label for="male">
            		<input type="radio" name="gender" id="male" value="M"> Masculino
            	</label>
            	<label for="female">
            		<input type="radio" name="gender" id="female" value="F"> Feminino
            	</label>
            	<label for="other">
            		<input type="radio" name="gender" id="other" value="Não informado"> Prefiro não informar
            	</label>
            </div>
            <br>
            <label for="newRole">
            	Cargo: <br>
            	<input type="text" id="newRole" name="nRl" required>
            </label>
            <br>
            <label for="newPassword">
            	Senha: <br>
            	<input type="password" id="newPassword" name="nPwd" required />
            </label>
            <br>
            <label for="rePassword">
            	Confirmar senha: <br>
            	<input type="password" id="rePassword" name="rPwd"/>
            </label>
            <br>
            <input type="submit" value="Registrar-se">
            <a href="login_form.php">Voltar</a>
		</form>
	</main>
</body>
</html>