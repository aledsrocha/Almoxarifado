<?php 
	
	class User{
		public $id;
		public $email;
		public $password;
		public $birthdate;
		public $name;
		public $token;

	}
	interface userDao{
		public function findByToken($token);
		public function findByEmail($email);
		public function update(User $u);
	}
 ?>