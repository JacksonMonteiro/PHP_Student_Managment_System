<?php  
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/admin.css" />
	<title>SGE - Administradores e Moderadores</title>
</head>
<body>
	<main>
		<table>
			<thead>
				<tr>
					<th>Nome de usuário: </th> 
					<th>E-mail: </th>
					<th>Sexo: </th>
					<th>Função: </th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once("./controller/AdminControl.class.php");

					$control = new AdminControl();
					$data = $control->read();

					if ($data != null) {
						foreach($data as $item) {
							echo 
							"
								<tr>
									<td>{$item->getUsername()}</td>
									<td>{$item->getEmail()}</td>
									<td>{$item->getGender()}</td>
									<td>{$item->getRole()}</td>
							";
						}
					}
				?>
			</tbody>
		</table>
		
		<?php  
			
			$newData = $control->readOne($_SESSION["email"]);
			echo "
				<a href='./dashboard.php' class='exit-btn'>Voltar</a>
			";
		?>
	</main>
</body>
</html>