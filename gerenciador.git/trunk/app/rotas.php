<?php 
class Rota {

	private static $url;

	public static function logado() {
		include('app/DB.php');
		$db = DB::conectar();
		
	}

	public static function setarRotas() {
		self::$url = array();
		self::$url['/gerenciador'] = array('controlador' => 'HomeControle', 'acao' => 'Home');
		self::$url['/gerenciador/'] = array('controlador' => 'HomeControle', 'acao' => 'Home');
		self::$url['/gerenciador/login'] = array('controlador' => 'LoginControle', 'acao' => 'Login');
		self::$url[LOCALHOST.'verificalogin'] = array('controlador' => 'LoginControle', 'acao' => 'verificaLogin');
		self::$url[LOCALHOST.'sair'] = array('controlador' => 'LoginControle', 'acao' => 'sair');
	}

	public static function buscaRota() {
		return $_SERVER['REQUEST_URI'];
	}

	public static function usarRota() {
		self::setarRotas();

		session_start();

		foreach (self::$url as $chave=>$valor) {
            if (self::buscaRota() == $chave) {
                if (file_exists('app/controladores/'.$valor['controlador'].'.php')) {
                    include 'app/controladores/'.$valor['controlador'].'.php';

                    $c = new $valor['controlador'];
                    $acao = $valor['acao']; 
                    $c::$acao();

                } else {
                    echo "Controlador nao encontrado";
                }
            }
        }
	}

}