<?php 
	require_once 'config.php';


	$name = filter_input(INPUT_POST, 'name');
	$quantidade = filter_input(INPUT_POST, 'quantidade');

	if ($name && $quantidade) {

		$sql = $pdo->prepare("SELECT * FROM produtos WHERE name =:name ");
		$sql->bindValue(':name', $name);
		$sql->execute();
		

		if ($sql->rowCount() === 0) {
			$sql = $pdo->prepare("INSERT INTO produtos (name, quantidade) VALUES (:name, :quantidade)");
			$sql->bindValue(':name', $name);
			$sql->bindValue('quantidade', $quantidade);
			$sql->execute();


			header("Location:" .$base);
			exit;

		}//rowCOunt
		else{
			$_SESSION['flash'] = 'Produto ja se encontra cadastrado';
			header("Location:" . $base. "/adicionar.php");
			exit;
		}
		


	}//name qualidade

	header("Location:" .$base . "/adicionar.php");
		exit;

 ?>