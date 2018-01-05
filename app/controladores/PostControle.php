<?php

class PostControle {
	public static function apagarPost() {
		include_once("app/DB.php");
		$id = $_POST['idpost'];
		$sql = "DELETE FROM post WHERE id = $id";

		$conn = DB::conectar();
		$apagarpost = $conn->prepare($sql);
		$apagarpost->execute();

	}
}