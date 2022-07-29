<?php 
	require_once 'config.php';
	require_once 'models/Auth.php';

	//passando a conexão com banco de dados dentro do parametro
	$auth = new Auth($pdo, $base);
	//verificando se usuario ta logado
	$userInfo = $auth->checkToken();

	require_once 'partial/header.php';


	?>


	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assents/cs/forms.css">
	<section class="form-add">
		<form method="post" action="adicionar_action.php">
			<h2>adicionar o produto</h2>
			<?php if(!empty($_SESSION['flash'])): ?>
				<?=$_SESSION['flash'];?>
				<?=$_SESSION['flash'] = '';?>
			<?php endif; ?><br>
			<label>Nome:</label>
			<input type="text" name="name" placeholder="insira o nome do produto">
			<label>Quantidade:</label>
			<input type="number" name="quantidade" placeholder="insira a quantidade que deseja"><br>
			<input type="submit" name="" value="cadastrar o produto" class="btn-input">


		</form>
		</section>

		

	<?php 

	require_once 'partial/footer.php';
	 ?>