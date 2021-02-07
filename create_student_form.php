<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="./view/css/create_student.css"/>
	<title>Cadastrar Aluno</title>
</head>
<body>
	<main>
		<?php
            require_once('./controller/AdminControl.class.php');
            $admControl = new AdminControl();
            $data = $admControl->readOne($_GET["email"]);
            echo 
            "<form action='create_student.php?email={$data['email']}' method='POST'>
            "; ?>
                  <h1>Cadastrar aluno</h1>
			<label for="newUsername">
				Nome de usuário: <br>
				<input type="text" id="newUsername" name="nUsr" required placeholder="Aluno">
			</label>
			<br>
			<label for="newEmail">
				Email: <br>
				<input type="email" id="newEmail" name="nEml" required placeholder="aluno@sge.com">
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
            <label for="newCourse">
            	Curso: <br>
            	<input type="text" id="newCourse" name="nRl" required placeholder="Informática">
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