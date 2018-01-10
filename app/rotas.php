<?php 
class Rota {

	private static $url;

	public static function logado() {
		include('app/DB.php');
		$db = DB::conectar();
		
	}

	public static function setarRotas() {
		self::$url = array();
		self::$url[LOCALHOST] = array('controlador' => 'HomeControle', 'acao' => 'Home');
		self::$url[LOCALHOST.'login'] = array('controlador' => 'LoginControle', 'acao' => 'Login');
		self::$url[LOCALHOST.'verificalogin'] = array('controlador' => 'LoginControle', 'acao' => 'verificaLogin');
		self::$url[LOCALHOST.'sair'] = array('controlador' => 'LoginControle', 'acao' => 'sair');
		self::$url[LOCALHOST.'dash'] = array('controlador' => 'HomeControle', 'acao' => 'homeDash');
		self::$url[LOCALHOST.'inserirpost'] = array('controlador' => 'HomeControle', 'acao' => 'gravar');
		self::$url[LOCALHOST.'apagarpost'] = array('controlador' => 'PostControle', 'acao' => 'apagarPost');
		self::$url[LOCALHOST.'editarpost'] = array('controlador' => 'PostControle', 'acao' => 'editarPost');
	}

	public static function buscaRota() {
		$a = explode('?', $_SERVER['REQUEST_URI']);
		return $a[0];
	}

	public static function usarRota() {
		self::setarRotas();
		session_start();
		if (isset(self::$url[self::buscaRota()])) {
			$rota = self::$url[self::buscaRota()];
			if (file_exists('app/controladores/'.$rota['controlador'].'.php')) {
				include 'app/controladores/'.$rota['controlador'].'.php';
				$con = new $rota['controlador'];
				$acao = $rota['acao'];
				$con::$acao();
			} else {
				echo "<p>Controlador não encontrado</p>";
			}
		} else {
			echo "<p>Página não encontrada</p>";
		}
	}

}
