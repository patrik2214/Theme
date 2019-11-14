function validar_usuario() {
	var user = $("#usuario").val();
	$.ajax({
		url: "../php/user_validation.php",
		dataType: "text",
		type: "post",
		data: { user: user },
		success: function(data) {
			console.log(data);
			$("#pss").html(data);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
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
}
