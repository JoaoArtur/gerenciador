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
				self::inserirPost();
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

		die(self::montarHtmlListagem($arr_dashdados));
	}

	private static function montarHtmlListagem($arr_dashdados) {
		$html = '<div class="container">
					<table class="table">
						<thead>
							<tr>
								<td class="col-md-3">ID</td>
								<td class="col-md-3">TÍTULO</td>
								<td class="col-md-3">SUBTITULO</td>
								<td class="col-md-3">TEXTO</td>
								<td class="col-md-3">AÇÃO</td>
							</tr>
						</thead>
						<tbody>';
							 
								foreach($arr_dashdados as $dashdados) { 
									
		$html .=					'<tr id="'. $dashdados['id'] .'">
										<td class="col-md-3">'. $dashdados['id'] .'</td>
										<td class="col-md-3">'. $dashdados['titulo'] .'</td>
										<td class="col-md-3">'. $dashdados['subtitulo'] .'</td>
										<td class="col-md-3">'. $dashdados['texto'] .'</td>
										<td id="col-acaopost" class="col-md-3" data-idpost="'.$dashdados['id'].'">
											<i class="fa fa-pencil-square-o col-md-5 btn-acaopost" aria-hidden="true" style="cursor: pointer" data-acao="editar" data-toggle="modal" data-target="#modal_editarpost"></i>
												<div id="div_modaleditarpost">
												</div>
											<i class="fa fa-window-close col-md-5 btn-acaopost" aria-hidden="true" style="cursor: pointer" data-acao="apagar"></i>
										</td>
									</tr>';
									 
								}
							
		$html .=		'</tbody>
					</table>
				</div>';

		return $html;
	}

	private static function inserirPost() {
		die(self::montarHtmlPost());
	}

	private static function montarHtmlPost() {
		$html = '<div class="container" style="margin-left: 50px;">
					<div class="col-md-12">
						<form id="inserirpost" action="'. LOCALHOST."inserirpost" .'" method="POST">	
							<h3>Título</h3>
								<input type="text" name="titulo" />
							<h3>Subtítulo</h3>
								<input type="text" name="subtitulo" />
							<h3>Texto</h3>
								<textarea rows="4" cols="50" name="texto" />
<br><br>
								<input id="postar" type="submit" value="Postar" />
						</form>
					</div>
				</div>';

		return $html;
	}

	public static function gravar() {
		// var_dump($_POST);
		$titulo = $_POST['titulo'];
		$subtitulo = $_POST['subtitulo'];
		$texto = $_POST['texto'];

		include_once("app/DB.php");

		$sql = "INSERT INTO post(titulo, subtitulo, texto) VALUES('".$titulo."', '".$subtitulo."', '".$texto."')";

		$conn = DB::conectar();
		$dados = $conn->prepare($sql);
		$dados->execute();

		$redirect = LOCALHOST;
		header("location:$redirect");
	}
}