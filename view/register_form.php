<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="./css/register.css"/>
	<title>Registrar-se</title>
</head>
<body>
      <div class="orange_vector"></div>
      <div class="white_vector"></div>
      <div class="green_vector"></div>

	<main>
		<form action="../controller/handlers/create_admin.php" method="POST">
                  <h1>Registrar-se</h1>
			<label for="newUsername">
				Nome de usuário: <br>
				<input type="text" id="newUsername" name="nUsr" required placeholder="admin">
			</label>
			<br>
			<label for="newEmail">
				Email: <br>
				<input type="email" id="newEmail" name="nEml" required placeholder="admin@sge.com">
			</label>
            <br>
            <label class="gender">
                  Sexo:
            </label>
            <div>
                  <br>
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
            	<input type="text" id="newRole" name="nRl" required placeholder="diretor">
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
            <div class="flex">
                  <input type="submit" value="Registrar-se" class="register-btn">
                  <a href="login_form.php" class="back-btn">Voltar</a>
            </div>
		</form>
	</main>
</body>
</html>