$(document).ready(function() {
	alert("OK");
	$(".gerenciador").click(function(){
		alert($(this)).data("pagina");
	});
});