<?php 
	require_once 'config.php';
	require_once 'models/Auth.php';

	//passando a conexão com banco de dados dentro do parametro
	$auth = new Auth($pdo, $base);
	//verificando se usuario ta logado
	$userInfo = $auth->checkToken();

	require_once 'partial/header.php';

	$lista = [];
	$sql = $pdo->query("SELECT * FROM produtos");
	if ($sql->rowCount() > 0) {
		$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	?>
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assents/cs/tabela.css">
	<table border="1" width="100%">
		<tr class="tabela" >
			<th>ID</th>
			<th>NAME</th>
			<th>QUANTIDADE</th>
			<th>EDITAR/EXCLUIR</th>
		</tr>

		<?php 
		foreach ($lista as $usuarios): ?>

			<tr>
				<td><?=$usuarios['id'];?></td>
				<td><?=$usuarios['name'];?></td>
				<td><?=$usuarios['quantidade'];?></td>
				<td>
				<a href="<?=$base;?>/editar.php?id=<?=$usuarios['id'];?>"><img src="<?=$base?>/media/img/editar.png" width="25">[ Editar ]</a>
				<a href="<?=$base;?>/excluir.php?id=<?=$usuarios['id'];?>"> <img src="<?=$base?>/media/img/excluir.png" width="25">[ excluir ]</a>
				</td>
			</tr>


	<?php endforeach; ?>
	</table>

	


	<?php 
	require_once 'partial/footer.php';
	 ?>
	

