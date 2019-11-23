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

function delete_repositorio(idrepositorio) {
	$.ajax({
		url: "../php/delete_repo.php",
		type: "post",
		data: {idrepositorio:idrespositorio},
		success: function(data) {
			if (data == 1) {
				$("#newrama").modal("toggle");
				Swal.fire("DELETE!", "Repositorio is Delete!", "success");
			} else {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Some problem!"
				});
			}
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
		});
}

function porfile(){
	listar_repos();
	porfile_user();
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
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}

function edit_repo_admin() {
	var idrepositorio = document.getElementById('txtrepositorio').value;
	var name = document.getElementById('txtname').value;
	var date =document.getElementById('txtdate').value;
	var public = document.getElementById('txtpublic').value;
	var cola = document.getElementById('txtcol').value;
	var des =document.getElementById('txtdes').value;
	$.ajax({
		url: "../php/actualizar_repo_admin.php",
		dataType: "text",
		type: "post",
		data: {idrespositorio:idrepositorio,name:name,date:date, public:public,cola:cola,des:des},
		success: function(data) {
			var datos = JSON.parse(data);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}

function update_repo_admin(idrepositorio) {
	$.ajax({
        url: '../php/edit_repositorio_admin.php',
        type: 'post',
        data: {"idrepositorio":idrepositorio},
        success: function( data ){
			var datos = JSON.parse(data);
			$("#txtrepositorio").val(datos.idrespositorio);
        	$("#txtname").val(datos.nombre);
        	$("#txtdate").val(datos.fecha_creacion);
        	$("#txtpublic").val(datos.publico);
			$("#txtcol").val(datos.colaborativo);
			$("#txtdes").val(datos.descripcion);
        },
        error: function( jqXhr, textStatus, error ){
            console.log( error );
        }
    });
}

function new_pry(rep) {
	let gnr = $("#gnrmusical").val();
	let idpry = $("#idpry").val();
	console.log(idpry);
	if (idpry > 0) {
		// Editar
		$.ajax({
			url: "../php/update_pry.php",
			dataType: "text",
			type: "post",
			data: {
				idgnr: gnr,
				idpry: idpry
			},
			success: function(data) {
				if (data == 1) {
					$("#new_rama").modal("toggle");
					Swal.fire("Good job!", "Actualizacion realizada!", "success");
					listar_prys(rep);
					$("#gnrmusical").val(-1);
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
	} else {
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
						$("#gnrmusical").val(-1);
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

function list_user_info() {
	$.ajax({
		url: "../php/list_user.php",
		type: "post",
		data: {},
		success: function(data) {
			var datos = JSON.parse(data);
			$("#username").html(datos.nombreusuario);
			$("#idusuario").val(datos.idusuario);
			$("#txtname").val(datos.nombre);
			$("#txtlastname").val(datos.apellido);
			$("#txtemail").val(datos.correo);
			$("#userpic").attr('src', datos.foto);
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function porfile_user() {
	$.ajax({
		url: "../php/user_porfile.php",
		type: "post",
		data: {},
		success: function(data) {
			console.log(data);
			$("#info").html(data);
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function search(username) {
	$.ajax({
		url: "../php/porfile_another.php",
		type: "post",
		data: {"username":username},
		success: function(data) {
			console.log(data);
			$("#data").html(data);
			if (data == 1) {
				window.location.replace("../html/porfile_another.php");
			}
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}


function userlike() {
	var username= document.getElementById("search").value;
	$.ajax({
		url: "../php/user_result.php",
		type: "post",
		data: {"username":username},
		success: function(data) {
			console.log(data);
			$("#searchuser").html(data);
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}


function modify_user(idusuario) {
	var name = document.getElementById("txtname").value;
	var lastname = document.getElementById("txtlastname").value;
	var username = document.getElementById("txtusername").value;
	var email = document.getElementById("txtemail").value;
	var password = document.getElementById("txtpass").value;
	var cpassword = document.getElementById("txtcpass").value;
	var img = document.getElementById("img").files[0];

	var formData = new FormData();
	formData.append("name", name);
	formData.append("lastname", lastname);
	formData.append("username", username);
	formData.append("email", email);
	formData.append("pass", password);
	formData.append("cpass", cpassword);
	formData.append("img", img);
	formData.append("idusuario", idusuario);

	$.ajax({
		url: "../php/update_info_user.php",
		dataType: "text",
		type: "post",
		data: formData,
		contentType: false,
		processData: false,
		success: function (data) {
			console.log(data);
			if (data == 1) {
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Your work has been saved',
					showConfirmButton: false,
					timer: 1500
				});
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
					showConfirmButton: false,
					timer: 1500
				});
			}
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}

function delete_user(idusuario) {
	$.ajax({
		url: "../php/delete_user.php",
		type: "post",
		data: { "idusuario": idusuario },
		success: function(data) {
			console.log(data);
			if (data == 1) {
				$("#new_rama").modal("toggle");
				Swal.fire(
					"Good job!",
					"Save All Changes",
					"success"
				);
			} else {
				Swal.fire({
					icon: "Error",
					title: "Oops...",
					text: "Some Problems!"
				});
			}
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function editar_pry(idpry) {
	$.ajax({
		url: "../php/editar_pry.php",
		dataType: "text",
		type: "post",
		data: { idpry: idpry },
		success: function(data) {
			var datos = JSON.parse(data);
			$("#gnrmusical").val(datos.idgenero);
			$("#idpry").val(datos.idproyecto);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}

function clean_gnr() {
	$("#gnrmusical").val(-1);
	$("#idpry").val("");
}

function delete_pry(idpry) {
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: "../php/delete_pry.php",
				dataType: "text",
				type: "post",
				data: { idpry: idpry },
				success: function (data) {
					console.log(data);
					if (data == 1) {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Your work has been saved',
							showConfirmButton: false,
							timer: 1500
						});
						$("#home-tab").trigger('click');

					} else {
						Swal.fire({
							position: 'top-end',
							icon: 'error',
							title: 'Error borrando los archivos',
							showConfirmButton: false,
							timer: 1500
						});
					}
				},
				error: function (jqXhr, textStatus, errorThrown) {
					console.log(errorThrown);
				}
			});
			
		}
	})
}

function checkLoginState() {
	FB.getLoginStatus(function (response) {
		statusChangeCallback(response);
	});
}

function buscar() {
	var textoBusqueda = $("#busqueda").val();
	$.ajax({
		url: "../php/buscar_repo.php",
		type: 'post',
		data: { 'txtbuscar': textoBusqueda },
		success: function (data) {
			$("#colum1").html(data);

		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function list_all_users() {
	$.ajax({
		url: "../php/all_users.php",
		type: 'post',
		data: { },
		success: function (data) {
			$("#divregistros").html(data);
		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}
function list_all_pistas() {
	$.ajax({
		url: "../php/all_pistas.php",
		type: 'post',
		data: { },
		success: function (data) {
			$("#colum1").html(data);
		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}


function edit_user_admin(idusuario){
	$.ajax({
        url: '../php/edit_user_admin.php',
        type: 'post',
        data: {"idusuario":idusuario},
        success: function( data ){
			var datos = JSON.parse(data);
			$("#txtidusuario").html(idusuario);
        	$("#txtname").val(datos.nombre);
        	$("#txtlastname").val(datos.apellido);
        	$("#txtusername").val(datos.nombreusuario);
			$("#txtemail").val(datos.correo);
			$("#txtdate").val(datos.fecha_registro);
        },
        error: function( jqXhr, textStatus, error ){
            console.log( error );
        }
    });
}


function save (){
	var idusuario = document.getElementById("txtidusuario").value;
	var name = document.getElementById("txtname").value;
	var lastname = document.getElementById("txtlastname").value;
	var username = document.getElementById("txtusername").value;
	var email = document.getElementById("txtemail").value;

	$.ajax({
        url: '../php/actualizar_admin.php',
        type: 'post',
        data: {"idusuario":idusuario,"name":name,"lastname":lastname,"username":username, "email":email},
        success: function( data ){
			console.log(data);
			if (data == 1) {
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Your updates has been saved',
					showConfirmButton: false,
					timer: 1500
				});
			} else {
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					title: 'Something is Wrong ',
					showConfirmButton: false,
					timer: 1500
				});
			}
        },
        error: function( jqXhr, textStatus, error ){
            console.log( error );
        }
    });
}