<?php 
	require_once 'models/User.php';
	class UserDaoMysql implements UserDao{

		private $pdo;

		public function __construct(PDO $driver){
			$this->pdo = $driver;
		}//construct

		//montando o objeto
		private function generateUser($array){
			$u = new User();
			$u->id = $array['id'] ?? 0;
			$u->email = $array['email'] ?? '';
			$u->password = $array['password'] ?? '';
			$u->birthdate = $array['birthdate'] ?? '';
			$u->name = $array['name'] ?? '';
			$u->token = $array['token'] ?? '';

			return $u;

		}

		public function findByToken($token){

			if (!empty($token)) {
				
				$sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE token = :token");
				$sql->bindValue(':token', $token);
				$sql->execute();

				//fazendo a verificação se achou algo e criando o bojeto
				if ($sql->rowCount() > 0) {
					$data = $sql->fetch(PDO::FETCH_ASSOC);
					$user = $this->generateUser($data);
					return $user;
				}
			}//emppty token

			return false;

		}//findbytoken

		public function findByEmail($email){

			if (!empty($email)) {

				$sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
				$sql->bindValue(':email', $email);
				$sql->execute();

				if ($sql->rowCount() > 0) {

					$data = $sql->fetch(PDO::FETCH_ASSOC);
					$user = $this->generateUser($data);
					return $user;

				}//rowcount
				return false;
			}//if email

			
		}//findbyemail

		public function update(User $u){
			$sql = $this->pdo->prepare("UPDATE usuarios SET 
				email = :email,
				password = :password,
				birthdate = :birthdate,
				name = :name,
				token = :token
				WHERE id = :id
				");

			$sql->bindValue(':email' , $u->email);
			$sql->bindValue(':password' , $u->password);
			$sql->bindValue(':birthdate' , $u->birthdate);
			$sql->bindValue(':name' , $u->name);
			$sql->bindValue(':token' , $u->token);
			$sql->bindValue(':id' , $u->id);
			$sql->execute();

			return true;
		}//update

		public function insert(User $u){
			$sql = $this->pdo->prepare("INSERT INTO usuarios (
				email, password, name, birthdate , token
		) VALUES (
		:email, :password, :name, :birthdate , :token
		)");
			$sql->bindValue(':email' , $u->email);
			$sql->bindValue(':password' , $u->password);
			$sql->bindValue(':birthdate' , $u->birthdate);
			$sql->bindValue(':name' , $u->name);
			$sql->bindValue(':token' , $u->token);
			$sql->execute();

			return true;

		}
	}//class

 ?>