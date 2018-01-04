<?php 

abstract class DB {
	public static function conectar() {
		try {
			$con = new PDO("mysql: host=".DBHOST."; dbname=".DBNAME , DBUSER, DBPASS);
			return $con;
		} catch(PDOException $e) {
			echo $e->getMessage;
		}
	}

}