<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/student.css" />
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
					<th>Função: </th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once("./controller/StudentControl.class.php");

					$control = new StudentControl();
					$data = $control->read();

					if ($data != null) {
						foreach($data as $item) {
							echo 
							"
								<tr>
									<td>{$item->getName()}</td>
									<td>{$item->getEmail()}</td>
									<td>{$item->getGender()}</td>
									<td>{$item->getCourse()}</td>
							";
						}
					}
				?>
			</tbody>
		</table>

		<?php  
			require_once("./controller/AdminControl.class.php");
			$admControl = new AdminControl();
			$data = $admControl->readOne($_GET["email"]);
			echo "
				<div class='btns'>
					<a href='./create_student_form.php?email={$data['email']}' class='register-btn'>Cadastrar Aluno</a>
					<a href='./dashboard.php?email={$data['email']}' class='exit-btn'>Voltar</a>
				</div>
			";
		?>
	</main>
</body>
</html>