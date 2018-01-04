$(document).ready(function() {
	$("ul#lista-menu li").click(function() {
		$(".active").removeClass("active");
		$(this).addClass("active");
		var pagina = $(this).data("pagina");
		buscarPaginaGerenciador(pagina);
	});
})

function buscarPaginaGerenciador(pagina) {
	$.ajax({
		url: "/gerenciador/dash",
		type: "POST",
		data: { pagina : pagina },
		success: function(resp) {
			$("div#pagina").empty().append(resp);
		}
	});
}