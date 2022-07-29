<?php 
	require_once 'models/Product.php';

	  class ProductDaoMysql implements ProductDao{
	  	private $pdo;

	  	
    	public function __construct(PDO $driver) {
        $this->pdo = $driver;

    }

    public function insert(Product $p){

    	if ($p) {
    		$sql = $this->pdo->prepare("SELECT * FROM produtos WHERE name = :name");
				$sql->bindValue(':name', $p->name);
				$sql->execute();

		if ($sql->rowCount() === 0) {
		
		$sql = $this->pdo->prepare("INSERT INTO produtos(name, quantidade) VALUES (:name, :quantidade)");
		$sql->bindValue(':name', $p->name);
		$sql->bindValue(':quantidade', $p->quantidade);
		$sql->execute();


		header("Location:" .$base);
		exit;
		}
    	}
    }
	  }

 ?>