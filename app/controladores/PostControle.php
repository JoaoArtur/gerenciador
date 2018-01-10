<?php

class PostControle {
	public static function apagarPost() {
		$id = $_POST['idpost'];
		$sql = "DELETE FROM post WHERE id = $id";
		
		$apagarpost = DB::executar($sql);
	}

	public static function editarPost() {
		include_once("app/DB.php");
		$id = $_POST['idpost'];
		$sql = "SELECT * FROM post WHERE id = $id";

		$apagarpost = DB::executar($sql);

		die(self::montarHtmlEditarPost($id));

	}

	private static function montarHtmlEditarPost($id) {
		$html ='
				<div id="modal_editarpost" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Topo</h3>
							</div>
							<div class="modal-body">
								<h3>Corpo</h3>
							</div>
							<div class="modal-footer">
								<h3>Footer</h3>
							</div>
						</div>
					</div>
				</div>
				';

		return $html;
	}
}
