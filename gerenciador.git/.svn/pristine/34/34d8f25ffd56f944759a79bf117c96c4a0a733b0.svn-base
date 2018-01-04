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
}