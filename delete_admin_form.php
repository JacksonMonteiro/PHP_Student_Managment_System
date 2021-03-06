<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/remove_admin.css" />
	<title>SGE - Remover Administrador ou Moderador</title>
</head>
<body>
	<?php
		require_once('./controller/AdminControl.class.php');
		$control = new AdminControl();
		$data = $control->readOne($_SESSION["email"]);
	?>

	<main>
		<?php  
			echo "<form action='delete_admin.php?email={$data['email']}' method='POST'>";
		?>
			<h1>Deletar Moderador</h1>
			<p>Confirme o seu email para concluir a desativação da sua conta</p>
			<div>
				<label for="email">
				Email: <input type="email" id="email" name="email" required autofocus/>
				</label>
				<br>
				<input type="submit" value="Deletar" class="delete-btn"/>
				<?php  
					echo "<a href='./update_admin_form.php' class='exit-btn'>Voltar</a>";
				?>
			</div>
		</form>
	</main>
</body>
</html>