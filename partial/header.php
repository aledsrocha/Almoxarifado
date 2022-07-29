<?php 
//para colocar o nome do usuario que aparece
$firstName = current(explode(' ', $userInfo->name));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assents/cs/header.css">
	<title>Almoxarifado</title>
</head>
<body>
<header class="container">
	
		<div class="logo">
			<a href="<?=$base?>"><img  src="<?=$base?>/media/img/logo.png" height="40px"></a>
			
		</div>
		<button class="info exit"><a href="<?=$base;?>/logout.php">Sair</a></button>
		<div class="info"><p>olá <?=$firstName;?></p></div>
		
		
	
</header>
<nav class="menu"><ul>
			<li><a href="<?=$base;?>"> Inicio</a></li>
			<li><a href="<?=$base;?>\adicionar.php"> adicionar</a></li>
			
			<li><a href="<?=$base;?>\excluir.php"> excluir</a></li>
		</ul></nav><br>

		



