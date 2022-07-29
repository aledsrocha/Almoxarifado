<?php 
	require_once 'config.php';
	require_once 'models/Auth.php';

	//passando a conexão com banco de dados dentro do parametro
	$auth = new Auth($pdo, $base);
	//verificando se usuario ta logado
	$userInfo = $auth->checkToken();

	require_once 'partial/header.php';

	$info = [];
	$id = filter_input(INPUT_GET, 'id');
	if ($id) {
		$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() >0) {
			$info = $sql->fetch(PDO::FETCH_ASSOC);
		}

		
	}

		


	?>



	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assents/cs/forms.css">
	<section class="form-add">
		<form method="post" action="editar_action.php">
			<h2>Editar o produto</h2>

			<input type="hidden" name="id" value="<?=$info['id']?>">
			<label>Nome:</label>
			<input type="text" name="name" value="<?=$info['name']?>">
			<label>Quantidade:</label>
			<input type="number" name="quantidade" value="<?=$info['quantidade']?>"><br>
			<input type="submit" name="" value="atualizar o produto" class="btn-input">


		</form>
		</section>

		

	<?php 


	require_once 'partial/footer.php';
	 ?>