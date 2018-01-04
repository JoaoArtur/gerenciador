$(document).ready(function() {
	$(".gerenciador").click(function() {
		// alert($(this).data("pagina"));
		var pagina = $(this).data("pagina");
		buscarPaginaGerenciador(pagina);
	})
})

function buscarPaginaGerenciador(pagina) {
	$.ajax({
		url: "/gerenciador/dash",
		type: "POST",
		data: { pagina : pagina },
		success: function(resp) {
			$("#pagina").empty().append(resp);
		}
	});
}