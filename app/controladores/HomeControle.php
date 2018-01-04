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
		include('../DB.php');
		
		switch ($_POST['pagina']) {
			case 'listar':
				$conn = DB::conectar();
				self::listagemPosts($conn);
				break;
			case 'postar':
				postar();
				break;
			default:
				echo $_POST['pagina'];
				break;
		}

	}

	private static function listagemPosts($conn) {
		$sql = "SELECT * FROM post ORDER BY id DESC";
		$dashdados = $conn->prepare($sql);
		$dashdados->execute();

		$arr_dashdados = $dashdados->fetchAll(PDO::FETCH_ASSOC);

		$paagina = include('../view/dashprincipal.php');

		return $pagina;

	}
}