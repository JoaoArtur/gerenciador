$(document).ready(function() {

	$("ul#lista-menu li").click(function() {
		$(".active").removeClass("active");
		$(this).addClass("active");
		var pagina = $(this).data("pagina");
		buscarPaginaGerenciador(pagina);
	});

});


function buscarPaginaGerenciador(pagina) {
	$.ajax({
		url: "/gerenciador/dash",
		type: "POST",
		data: { pagina : pagina },
		success: function(resp) {
			$("div#pagina").empty().append(resp);

			$(".btn-acaopost").click(function() {
				acaopost($(this));
			});
		}
	});
}

function acaopost(btn_acaopost) {
	var acao = btn_acaopost.data("acao");
	var idpost = btn_acaopost.parent("#col-acaopost");
	idpost = idpost.data("idpost");

	if(acao == "apagar") {
		$("tr#"+idpost).fadeOut('slow');
		apagarPost(idpost);
	} else if(acao == "editar") {
		editarPost(idpost);
	}

}

function editarPost(idpost) {
	$.ajax({
		url: "/gerenciador/editarpost",
		type: "POST",
		data: {
			idpost: idpost
		},
		success: function(resp) {
			// alert(resp);
			$("#div_modaleditarpost").empty().append();		
		}
	});
}

function apagarPost(idpost) {
	$.ajax({
		url: "/gerenciador/apagarpost",
		type: "POST",
		data: {
			idpost: idpost
		},
		success: function(resp) {
			alert("Post excluído");
		}
	});
}