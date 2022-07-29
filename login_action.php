<?php 
	require_once 'config.php';
	require_once 'models/Auth.php';


	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');

	

	if ($email && $password) {

		$auth = new Auth($pdo, $base);
		//se deu certo vai para pagina inicial
		if ($auth->validateLogin($email, $password)) {
			
			header("Location:". $base);
			exit;
			
		}//validatelogin

	}//password

	$_SESSION['flash'] = 'email ou senhas errados! 2';
	header("Location:" . $base. "/login.php");
	exit;
 ?>