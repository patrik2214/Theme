function validar_usuario() {
	var user = $("#usuario").val();
	$.ajax({
		url: "lista.php",
		dataType: "text",
		type: "post",
		data: { user: user },
		success: function(data) {
			$("#scnd").html(data);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
	paginacion();
}
