<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/remove_admin.css" />
	<title>SGE - Remover Moderador</title>
</head>
<body>
	<main>
		<form action="delete_admin.php" method="POST">
			<h1>Deletar Moderador</h1>
			<div>
				<label for="email">
				Email: <input type="email" id="email" name="email" required autofocus/>
				</label>
				<br>
				<input type="submit" value="Deletar" class="delete-btn"/>
				<a href="./admin_view.php" class="exit-btn">Voltar</a>
			</div>
		</form>
	</main>
</body>
</html>