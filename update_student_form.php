 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/update_student.css"/>
	<title>SGE - Atualizar Estudante</title>
</head>
<body>
	<main>
			<?php
			require_once("./controller/StudentControl.class.php");
			$control = new StudentControl();
			$data = $control->readOne($_GET["studentEmail"]);

			require_once("./controller/AdminControl.class.php");
			$admControl = new AdminControl();
			$admData = $admControl->readOne($_GET["email"]);

			if ($data != null) {
				echo 
				"
					<form action='update_student.php?email={$admData['email']}&studentEmail={$data['email']}' method='POST'>
						<h1>Atualizar Estudante</h1>
						<label for='name'>
							Nome de usuário: <input type='text' value='{$data['name']}' id='name' name='name'>
						</label>
						<br>
						<label for='email'>
							Email: <input type='email' value='{$data['email']}' id='email' name='email' disabled>
						</label>
						<br>
						<label for='gender'>
							Sexo: <input type='text' value='{$data['gender']}' name='gender'>
						</label>
						<br>
						<label for='course'>
							Curso: <input type='text' value='{$data['course']}' id='course' name='course'>
						</label>
						<br>
						<input type='submit' value='Atualizar' class='update-btn'>

						<a href='./student_view.php?email={$admData['email']}' class='exit-btn'>Voltar</a>
					</form>
				";
			}
			?>

	</main>
</body>
</html>