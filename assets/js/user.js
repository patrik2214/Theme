function inicioCargarRecursos() {
	listadoGeneros();
}

function listadoGeneros() {
	$.ajax({
		url: "../php/listar_generos.php",
		type: "post",
		data: {},
		success: function(data) {
			console.log(data);
			$("#gnrmusical").html(data);
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}
