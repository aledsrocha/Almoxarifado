<?php 
	require_once 'config.php';

	$id = filter_input(INPUT_POST, 'id');
	$name = filter_input(INPUT_POST, 'name');
	$quantidade = filter_input(INPUT_POST, 'quantidade');

	if ($id && $name && $quantidade) {
		$sql = $pdo->prepare("UPDATE produtos SET name = :name, quantidade = :quantidade WHERE id = :id");
		$sql->bindValue('name', $name);
		$sql->bindValue('quantidade', $quantidade);
		$sql->bindValue('id', $id);
		$sql->execute();

	}

	header("Location:". $base);
	exit;

 ?>