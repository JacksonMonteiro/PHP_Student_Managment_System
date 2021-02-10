<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/student.css" />
	<title>SGE - Alunos</title>
</head>
<body>
	<main>
		<table>
			<thead>
				<tr>
					<th>Nome: </th> 
					<th>E-mail: </th>
					<th>Sexo: </th>
					<th>Curso: </th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once("./controller/AdminControl.class.php");
					$admControl = new AdminControl();
					$admData = $admControl->readOne($_GET["email"]);

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
									<td><a href='delete_student_form.php?email={$admData['email']}'>Deletar</a></td>
									<td><a href='update_student_form.php?email={$admData['email']}&studentEmail={$item->getEmail()}'>Editar</a></td>
							";
						}
					}
				?>
			</tbody>
		</table>

		<?php  
			echo "
				<div class='btns'>
					<a href='./create_student_form.php?email={$admData['email']}' class='register-btn'>Cadastrar Aluno</a>
					<a href='./dashboard.php?email={$admData['email']}' class='exit-btn'>Voltar</a>
				</div>
			";
		?>
	</main>
</body>
</html>