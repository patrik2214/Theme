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
	let priv = 1;
	if ($("#privado:checked").val() == 0) {
		priv = 0;
	}
	console.log(priv);
	if (gnr == -1 || length(nom) == 0) {
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "Rellene todos los campos!"
		});
	} else {
		$.ajax({
			url: "../php/new_repo.php",
			type: "post",
			data: { gnr: gnr, des: des, nom: nom, priv: priv },
			success: function(data) {},
			error: function(jqXhr, textStatus, error) {
				console.log(error);
			}
		});
	}
}
