<?php  
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/remove_student.css" />
	<title>SGE - Remover Aluno</title>
</head>
<body>
	<?php
		require_once('./controller/AdminControl.class.php');
		$control = new AdminControl();
		$data = $control->readOne($_SESSION["email"]);
	?>

	<main>
		<?php  
			echo "<form action='delete_student.php?email={$data['email']}' method='POST'>";
		?>
			<h1>Deletar Aluno</h1>
			<p>Confirme o email do aluno para concluir a desativação da sua conta</p>
			<div>
				<label for="email">
				Email: <input type="email" id="email" name="email" required autofocus/>
				</label>
				<br>
				<input type="submit" value="Deletar" class="delete-btn"/>
				<?php  
					echo "<a href='./student_view.php?email={$data['email']}' class='exit-btn'>Voltar</a>";
				?>
			</div>
		</form>
	</main>
</body>
</html>