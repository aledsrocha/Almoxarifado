<?php 
	
	class Product{
		public $id;
		public $name;
		public $quantidade;
	}

	interface ProductDao{
		public function insert(Product $p);
	}
 ?>