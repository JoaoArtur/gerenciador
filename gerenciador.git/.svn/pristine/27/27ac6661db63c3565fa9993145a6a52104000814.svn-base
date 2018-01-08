<?php 

abstract class DB {
	public static function conectar() {
		try {
			$conn = new PDO("mysql:host=localhost;dbname=gerenciador", "root", "root");
			return $conn;
		} catch(PDOException $e) {
			echo $e->getMessage;
		}
	}

}