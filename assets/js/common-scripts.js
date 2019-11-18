/*---LEFT BAR ACCORDION----*/
$(function() {
	$("#nav-accordion").dcAccordion({
		eventType: "click",
		autoClose: true,
		saveState: true,
		disableLink: true,
		speed: "slow",
		showCount: false,
		autoExpand: true,
		//        cookie: 'dcjq-accordion-1',
		classExpand: "dcjq-current-parent"
	});
});

var Script = (function() {
	//    sidebar dropdown menu auto scrolling

	jQuery("#sidebar .sub-menu > a").click(function() {
		var o = $(this).offset();
		diff = 250 - o.top;
		if (diff > 0) $("#sidebar").scrollTo("-=" + Math.abs(diff), 500);
		else $("#sidebar").scrollTo("+=" + Math.abs(diff), 500);
	});

	//    sidebar toggle

	$(function() {
		function responsiveView() {
			var wSize = $(window).width();
			if (wSize <= 768) {
				$("#container").addClass("sidebar-close");
				$("#sidebar > ul").hide();
			}

			if (wSize > 768) {
				$("#container").removeClass("sidebar-close");
				$("#sidebar > ul").show();
			}
		}
		$(window).on("load", responsiveView);
		$(window).on("resize", responsiveView);
	});

	$(".fa-bars").click(function() {
		if ($("#sidebar > ul").is(":visible") === true) {
			$("#main-content").css({
				"margin-left": "0px"
			});
			$("#sidebar").css({
				"margin-left": "-210px"
			});
			$("#sidebar > ul").hide();
			$("#container").addClass("sidebar-closed");
		} else {
			$("#main-content").css({
				"margin-left": "210px"
			});
			$("#sidebar > ul").show();
			$("#sidebar").css({
				"margin-left": "0"
			});
			$("#container").removeClass("sidebar-closed");
		}
	});

	// custom scrollbar
	$("#sidebar").niceScroll({
		styler: "fb",
		cursorcolor: "#4ECDC4",
		cursorwidth: "3",
		cursorborderradius: "10px",
		background: "#404040",
		spacebarenabled: false,
		cursorborder: ""
	});

	$("html").niceScroll({
		styler: "fb",
		cursorcolor: "#4ECDC4",
		cursorwidth: "6",
		cursorborderradius: "10px",
		background: "#404040",
		spacebarenabled: false,
		cursorborder: "",
		zindex: "1000"
	});

	// widget tools

	jQuery(".panel .tools .fa-chevron-down").click(function() {
		var el = jQuery(this)
			.parents(".panel")
			.children(".panel-body");
		if (jQuery(this).hasClass("fa-chevron-down")) {
			jQuery(this)
				.removeClass("fa-chevron-down")
				.addClass("fa-chevron-up");
			el.slideUp(200);
		} else {
			jQuery(this)
				.removeClass("fa-chevron-up")
				.addClass("fa-chevron-down");
			el.slideDown(200);
		}
	});

	jQuery(".panel .tools .fa-times").click(function() {
		jQuery(this)
			.parents(".panel")
			.parent()
			.remove();
	});

	//    tool tips

	$(".tooltips").tooltip();

	//    popovers

	$(".popovers").popover();

	// custom bar chart

	if ($(".custom-bar-chart")) {
		$(".bar").each(function() {
			var i = $(this)
				.find(".value")
				.html();
			$(this)
				.find(".value")
				.html("");
			$(this)
				.find(".value")
				.animate(
					{
						height: i
					},
					2000
				);
		});
	}
})();

function new_repositorio() {
	var gnr = $("#gnrmusical").val();
	let des = $("#about_repo").val();
	let nom = $("#nombre_repo").val();
	let priv = 1;
	if ($("#privado:checked").val() == 0) {
		priv = 0;
	}
	if (gnr == -1 || nom.length == 0) {
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
			success: function(data) {
				console.log(data);
				if (data == 1) {
					$("#myModal").modal("toggle");
					Swal.fire("Good job!", "Repositorio listo para usar!", "success");
					listar_repos();
					limpiar_campos();
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Ocurrio un problema!"
					});
				}
			},
			error: function(jqXhr, textStatus, error) {
				console.log(error);
			}
		});
	}
}

function listar_repos() {
	$.ajax({
		url: "../php/list_repo.php",
		type: "post",
		data: {},
		success: function(data) {
			$("#colum1").html(data);
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function limpiar_campos() {
	$("#gnrmusical").val(-1);
	$("#about_repo").val("");
	$("#nombre_repo").val("");
}

function inicio() {
	listar_repos();
}

function view_repo(id) {
	$.ajax({
		url: "../php/view_repo.php",
		type: "post",
		data: { idrepo: id },
		success: function(data) {
			console.log(data);
			$("#myrepository").html(data);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}

function editar_repo(id) {
	$.ajax({
		url: "../php/editar.php",
		dataType: "text",
		type: "post",
		data: { id: id },
		success: function(data) {
			var datos = JSON.parse(data);
			$("#about_repo").val(datos.descripcion);
			$("#nombre_repo").val(datos.nombre);
			$("#cbocategoria").val(datos.idgenero);
			if (datos.publico == 1) {
				$("#privado").checked.val(true);
			} else {
				$("#privado").checked.val(false);
			}
			console.log(data);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}

function new_pry(rep) {
	var gnr = $("#gnrmusical").val();
	if (gnr == -1) {
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "Elige un nuevo genero!"
		});
	} else {
		$.ajax({
			url: "../php/new_pry.php",
			type: "post",
			data: { idrepo: rep, idgnr: gnr },
			success: function(data) {
				if (data == 1) {
					$("#new_rama").modal("toggle");
					Swal.fire(
						"Good job!",
						"Comienza a crear una nueva version de tu cancion!",
						"success"
					);
					listar_prys(rep);
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Ocurrio un problema!"
					});
				}
			},
			error: function(jqXhr, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	}
}

function listar_prys(id) {
	$.ajax({
		url: "../php/list_prys.php",
		type: "post",
		data: { idrepo: id },
		success: function(data) {
			$("#divregistros").html(data);
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function listar_colb(id) {
	$.ajax({
		url: "../php/list_colabs.php",
		type: "post",
		data: { idrepo: id },
		success: function(data) {
			$("#divcolaboradores").html(data);
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}
