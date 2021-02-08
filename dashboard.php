<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./view/css/dashboard.css">
	<title>SGE - Dashboard</title>
</head>
<body>
	<header>
		<div>
			<nav>
				<div>
					Seja Bem-vindo, 
					<?php
						require_once("./controller/AdminControl.class.php");
						$control = new AdminControl();
						$data = $control->readOne($_GET["email"]);
						echo "{$data['username']}";
					?>
				</div>

				<div>
					<ul>
						<?php echo "<li><a href='update_admin_form.php?email={$data['email']}'>Conta</a></li>" ?>
						<li><a href="login_form.php" class="logout-btn">Sair</a></li>
					</ul>
				</div>
			</nav>
	</header>

	<main>
		<?php  
			echo "<a href='./admin_view.php?email={$data['email']}'>";
		?>
				<div class="card">
					<img src="./view/assets/admin.svg" alt="Admin icon">	
					<div class="card-container">
						Administradores e Moderadores
					</div>	
				</div>
			</a>

		<?php  
			echo "<a href='./student_view.php?email={$data['email']}'>";
		?>
				<div class="card green-bckg">
					<img src="./view/assets/student.svg" alt="Admin icon">	
					<div class="card-container">
						Alunos
					</div>	
				</div>
			</a>
	</main>
</body>	
</html>