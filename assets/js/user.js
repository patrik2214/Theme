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

function new_repositorio() {
	var gnr = $("#gnrmusical").val();
	let des = $("#about_repo").val();
	let nom = $("#nombre_repo").val();
	if (gnr == -1 || length(nom) == 0) {
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "Something went wrong!",
			footer: "<a href>Why do I have this issue?</a>"
		});
	} else {
		$.ajax({
			url: "../php/new_repo.php",
			type: "post",
			data: { gnr: gnr, des: des, nom: nom },
			success: function(data) {},
			error: function(jqXhr, textStatus, error) {
				console.log(error);
			}
		});
	}
}
