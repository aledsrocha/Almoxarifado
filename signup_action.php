<?php 
	require_once 'config.php';
	require_once 'models/Auth.php';


	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	$name = filter_input(INPUT_POST, 'name');
	$birthdate = filter_input(INPUT_POST, 'birthdate'); // 00/00/0000

	if ($email && $password && $name && $birthdate) {

		$auth = new Auth($pdo, $base);


		$birthdate = explode('/', $birthdate);

		if (count($birthdate) != 3) {
			$_SESSION['flash'] = 'data de nascimento invalida';
			header("Location:" . $base. "/signup.php");
			exit;
		}

		$birthdate = $birthdate[2] .'-'.$birthdate[1] .'-'. $birthdate[0];
		if (strtotime($birthdate) === false) {
			$_SESSION['flash'] = 'data de nascimento invalida';
			header("Location:" . $base. "/signup.php");
			exit;
		}

		//========================================================

		if ($auth->emailExists($email) === false) {
			$auth->registerUser($email, $password, $name, $birthdate);
			header("Location:" . $base);
			exit;


		}//emailexist
		else{
			$_SESSION['flash'] = 'Email Ja Cadastrado!';
			header("Location:" . $base. "/signup.php");
			exit;
		}

	}//password

	$_SESSION['flash'] = 'preencha todos os campos';
	header("Location:" . $base. "/signup.php");
	exit;
 ?>