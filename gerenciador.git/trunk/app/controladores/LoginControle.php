<?php
class LoginControle {
	public static $pagina = 'login.php';

	public static function Login() {
		if(file_exists('app/view/'.self::$pagina)) {
			include('app/view/'.self::$pagina);
		} else {
			echo "view não encontrada!";
		}
	}

	public static function verificaLogin() {
		include("../DB.php");

		$conectar = DB::conectar();

		$usuario = $_POST['user'];
		$senha = $_POST['pass'];

		$sql = "SELECT id, usuario, senha FROM admin_usuario WHERE usuario = '".$usuario."' AND senha = '".$senha."'";

		$login = $conectar->prepare($sql);
		$login->execute();

		$linhalogin = $login->fetchAll(PDO::FETCH_ASSOC);

		foreach($linhalogin as $login) {
			session_start();
			
			if($login['usuario'] == $usuario && $login['senha'] == $senha) {
				$_SESSION['login'] = $login['id'];
				include("HomeControle.php");
				HomeControle::Home();
			} else {
				$_SESSION['login'] = 'OK';
				echo "Usuario não encontrado";
			}
		}

	}

	public static function sair() {
		session_destroy();
		include("HomeControle.php");
		HomeControle::Home();
	}
}