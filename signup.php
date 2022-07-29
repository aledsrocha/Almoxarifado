<?php 
	require_once 'config.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= $base?>/assents/cs/login.css">
	<title>LOGIN</title>
</head>
<body>
	<header class="container">
		<a href="<?= $base?>/login.php">Almoxarifado</a>
	</header>

	<section class="container">
		<form method="post" action="<?= $base?>/signup_action.php">
			<h2>Cadastro de novo usuario</h2>
			<?php if(!empty($_SESSION['flash'])): ?>
				<?=$_SESSION['flash'];?>
				<?=$_SESSION['flash'] = '';?>
			<?php endif; ?>
			<input placeholder="digite seu usuario" class="input" type="text" name="email">
			<input placeholder="digite sua senha" class="input" type="password" name="password">
			<input placeholder="digite seu nome completo" class="input" type="text" name="name">
			<input placeholder="digite sua data de nascimento" id="birthdate" class="input" type="text" name="birthdate">
			<input type="submit" class="input" value="Cadastrar" name="">
			
		</form>
		
	</section>

	<script src="https://unpkg.com/imask"></script>

	<script >
		IMask(
			document.getElementById("birthdate"), {mask: '00/00/0000'}
			);
	</script>

</body>
</html>