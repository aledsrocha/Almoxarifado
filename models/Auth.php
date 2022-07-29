<?php 
	require_once 'dao/UserDaoMysql.php';
	class Auth{
		private $pdo;
		private $base;
		private $dao;

		public function __construct(PDO $pdo, $base){
			$this->pdo = $pdo;
			$this->base = $base;
			$this->dao = new UserDaoMysql($this->pdo);

		}//construct
		//verificando se tem a sessão
		public function checkToken(){
			if (!empty($_SESSION['token'])) {
				$token = $_SESSION['token'];
				//verificando o usuario

				$user = $this->dao->findByToken($token);

				//verificando se achou
				if ($user) {
					return $user;
				}//if $user

			}//if session
			header("Location: ". $this->base. "/login.php");
			exit;

		}//checktoken

		//validando login
		public function validateLogin($email, $password){
			//verificando o usuario
			$user = $this->dao->findByEmail($email);
			if ($user) {
				//se achou alguem com esse email, verifica a senha
				if (password_verify($password, $user->password)) {

					//se achou gera o token
					$token = md5(time().rand(0,9999));
					//coloca o token no usuario
					$_SESSION['token'] = $token;
					$user->token = $token;
					//atualiza no db
					$this->dao->update($user);


					return true;
				}
			}//user

			return false;
		}//validatelogin

		public function emailExists($email){
			return $this->dao->findByEmail($email) ? true : false;
		}

		public function registerUser($email, $password, $name, $birthdate){

			$hash = password_hash($password, PASSWORD_DEFAULT);
			//gerando token
            $token = md5(time().rand(0 ,9999));
            //preenchando o novo usuario
            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = $hash;
            $newUser->birthdate = $birthdate;
            //token para fazer o cadastro e logar diretamente
            $newUser->token = $token;

            $this->dao->insert($newUser);
            //armazenando o token
            $_SESSION['token'] = $token;
		}
	}//auth
 ?>