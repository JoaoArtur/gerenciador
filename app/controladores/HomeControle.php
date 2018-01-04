<?php
class HomeControle {
	public static function Home() {
		if(isset($_SESSION['login']) && $_SESSION['login'] != 'OK') {
			if(file_exists('app/view/home.php')) {
				include('app/view/home.php');
			}
		} else {
			if(file_exists('app/view/login.php')) {
				include('app/view/login.php');
			} else {
				echo "view não encontrada!";
			}
		}
	}

	public static function homeDash() {	
		switch ($_POST['pagina']) {
			case 'listar':
				self::listarPosts();
				break;
			case 'postar':
				self::postar();
				break;
			default:
				echo $_POST['pagina'];
				break;
		}

	}

	private static function listarPosts() {
		include_once("app/DB.php");

		$sql = "SELECT * FROM post ORDER BY id DESC";

		$conn = DB::conectar();
		$dashdados = $conn->prepare($sql);
		$dashdados->execute();

		$arr_dashdados = $dashdados->fetchAll(PDO::FETCH_ASSOC);

		$pagina = include('../view/dashprincipal.php');

		return $pagina;
	}

	private static function postar() {
		echo "POAKSDPOKDAASOPDK";
	}
}