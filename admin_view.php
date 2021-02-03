<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/admin.css" />
	<title>SGE - Moderadores</title>
</head>
<body>
	<main>
		<table>
			<thead>
				<tr>
					<th>Nome de usuário: </th> 
					<th>E-mail: </th>
					<th>Sexo: </th>
					<th>Cargo: </th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once("./controller/AdminControl.class.php");

					$control = new AdminControl();
					$data = $control->read();

					foreach($data as $item) {
						echo 
						"
							<tr>
								<td>{$item->getUsername()}</td>
								<td>{$item->getEmail()}</td>
								<td>{$item->getGender()}</td>
								<td>{$item->getRole()}</td>
								<td><a href='#'>Editar</a></td>
								<td><a href='delete_admin_form.php'>Remover</a></td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>

		<a href="./dashboard.php" class="exit-btn">Voltar</a>
	</main>
</body>
</html>