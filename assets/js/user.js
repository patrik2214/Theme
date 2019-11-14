function validar_usuario() {
	var user = $("#usuario").val();
	$.ajax({
		url: "user_validation.php",
		dataType: "text",
		type: "post",
		data: { user: user },
		success: function(data) {
			$("#pss").html(data);
			$("#checkbox").html();
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
	paginacion();
}

function login() {
	var user = $("#usuario").val();
	$.ajax({
		url: "user_validation.php",
		dataType: "text",
		type: "post",
		data: { user: user },
		success: function(data) {
			$("#pss").html(data);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
	paginacion();
}
