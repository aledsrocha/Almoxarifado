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
		<form method="post" action="<?= $base?>/login_action.php">
			<h2>LOGIN</h2>
			<?php if(!empty($_SESSION['flash'])): ?>
				<?=$_SESSION['flash'];?>
				<?=$_SESSION['flash'] = '';?>
			<?php endif; ?>
			<input placeholder="digite seu usuario" class="input" type="text" name="email">
			<input placeholder="digite sua senha" class="input" type="password" name="password">
			<input type="submit" class="input" value="Logar" name="">
			<a href="<?= $base?>/signup.php">Novo Cadastro</a>
		</form>
		
	</section>

</body>
</html>