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
	// $("#sidebar").niceScroll({
	// 	styler: "fb",
	// 	cursorcolor: "#4ECDC4",
	// 	cursorwidth: "3",
	// 	cursorborderradius: "10px",
	// 	background: "#404040",
	// 	spacebarenabled: false,
	// 	cursorborder: ""
	// });

	// $("html").niceScroll({
	// 	styler: "fb",
	// 	cursorcolor: "#4ECDC4",
	// 	cursorwidth: "6",
	// 	cursorborderradius: "10px",
	// 	background: "#404040",
	// 	spacebarenabled: false,
	// 	cursorborder: "",
	// 	zindex: "1000"
	// });

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
				} else if (data ==3) {
					Swal.fire({
						icon: "error",
						title: "Cantidad limite",
						text: "Ya no puede crear mas repositorios"
					});
				}
				else {
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
	data: {idrepositorio:idrepositorio},
	success: function(data) {
		if (data == 1) {
			$("#newrama").modal("toggle");
			Swal.fire("DELETE!", "Repositorio is Delete!", "success");
			listar_repos();
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


function delete_colab(iduser,repo) {
	$.ajax({
	url: "../php/delete_colaborador.php",
	type: "post",
	data: {iduser :iduser,repo: repo},
	success: function(data) {
		if (data == 1) {
			$("#newrama").modal("toggle");
			Swal.fire("DELETE!", "Colaborator is Delete!", "success");
			listar_colb(repo);
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

function listar_repos2(user) {
	$.ajax({
		url: "../php/list_repo2.php",
		type: "post",
		data: {user: user},
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

function view_repo2(id) {
	$.ajax({
		url: "../php/view_repo2.php",
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
	var des = document.getElementById('txtdes').value;
	$.ajax({
		url: "../php/actualizar_repo_admin.php",
		dataType: "text",
		type: "post",
		data: { idrepositorio : idrepositorio , name: name, date: date, public: public, cola: cola, des: des},
		success: function (data) {
			console.log(data);
			if (data == 1) {
				$("#exampleModalLabel").modal("toggle");
				Swal.fire("Good job!", "Repositorio listo para usar!", "success");
				
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

function update_repo_admin(idrepositorio) {
	$.ajax({
        url: '../php/edit_repositorio_admin.php',
        type: 'post',
        data: {"idrepositorio":idrepositorio},
        success: function( data ){
			var datos = JSON.parse(data);
			$("#txtrepositorio").val(idrepositorio);
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
	let name_pry = $("#name_pry").val();
	let bpm_pry = $("#bpm_pry").val();
	let format_pry = $("#format_pry").val();
	if (idpry > 0) {
		// Editar
		$.ajax({
			url: "../php/update_pry.php",
			dataType: "text",
			type: "post",
			data: {
				idgnr: gnr,
				idpry: idpry,
				name: name_pry,
				bpm: bpm_pry,
				format: format_pry
			},
			success: function (data) {
				console.log(data);
				if (data == 1) {
					$("#new_rama").modal("toggle");
					Swal.fire("Good job!", "Actualizacion realizada!", "success");
					listar_prys(rep);
					$("#gnrmusical").val(-1);
					$("#name_pry").val("");
					$("#format_pry").val("");
					$("#bpm_pry").val("");
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
				data: {
					idrepo: rep, idgnr: gnr, name: name_pry, bpm: bpm_pry,
					format: format_pry },
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
						$("#name_pry").val("");
						$("#format_pry").val("");
						$("#bpm_pry").val("");
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
			$("#username").val(datos.nombreusuario);
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


function userlike(repo) {
	var username = document.getElementById("search").value;
	if (username.length == 0) {
		document.getElementById('searchuser').style.display = 'none';
	} else {
		$.ajax({
			url: "../php/user_result.php",
			type: "post",
			data: { "username": username, idrepo: repo },
			success: function (data) {
				console.log(data);
				$("#searchuser").html(data);
				document.getElementById('searchuser').style.display = 'block';
			},
			error: function (jqXhr, textStatus, error) {
				console.log(error);
			}
		});
	}
	
}

function userlikethat() {
	var buscar = document.getElementById("txtbuscar").value;
	if (username.length == 0) {
		//document.getElementById('searchuser').style.display = 'none';
		list_all_U();
	} else {
		$.ajax({
			url: "../php/user_search.php",
			type: "post",
			data: {"buscar":buscar},
			success: function (data) {
				console.log(data);
				$("#searchuser").html(data);
				document.getElementById('searchuser').style.display = 'block';
			},
			error: function (jqXhr, textStatus, error) {
				console.log(error);
			}
		});
	}
	
}


function modify_user() {
	var idusuario = document.getElementById("idusuario").value;
	var name = document.getElementById("txtname").value;
	var lastname = document.getElementById("txtlastname").value;
	var username = document.getElementById("username").value;
	var email = document.getElementById("txtemail").value;
	var img = document.getElementById("userpic").files[0];

	var formData = new FormData();
	formData.append("idusuario",idusuario);
	formData.append("name", name);
	formData.append("lastname", lastname);
	formData.append("username", username);
	formData.append("email", email);
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

function change_pass() {
	var idusuario = document.getElementById("idusuario").value;
	var pass = document.getElementById("pass").value;
	var con = document.getElementById("conidusuario").value;
	$.ajax({
		url: "../php/changepass.php",
		type: "post",
		data: { "idusuario": idusuario, "pass":pass, "con":con },
		success: function(data) {
			console.log(data);
			if (data == 1) {
				Swal.fire(
					"Good job!",
					"Save All Changes",
					"success"
				);
				list_all_users();
			} else {
				Swal.fire({
					icon: "Error",
					title: "Oops...",
					text: "Some Problems!",
					showConfirmButton: false,
					timer: 1500
				});
			}
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function delete_us() {
	var idusuario = document.getElementById("idusuario").value;
	$.ajax({
		url: "../php/delete_user.php",
		type: "post",
		data: { "idusuario": idusuario },
		success: function(data) {
			console.log(data);
			if (data == 1) {
				Swal.fire(
					"Good job!",
					"Save All Changes",
					"success"
				);
				list_all_users();
			} else {
				Swal.fire({
					icon: "Error",
					title: "Oops...",
					text: "Some Problems!",
					showConfirmButton: false,
					timer: 1500
				});
			}
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
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
			if (data == 0) {
				Swal.fire(
					"Good job!",
					"Save All Changes",
					"success"
				);
				list_all_users();
			} else {
				Swal.fire({
					icon: "Error",
					title: "Oops...",
					text: "Some Problems!",
					showConfirmButton: false,
					timer: 1500
				});
			}
		},
		error: function(jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function hab_user(idusuario) {
	$.ajax({
		url: "../php/hab.php",
		type: "post",
		data: { "idusuario": idusuario },
		success: function(data) {
			console.log(data);
			if (data == 1) {
				Swal.fire({
					icon: 'success',
					title: 'Se realizaron los cambios',
					showConfirmButton: false,
					timer: 1500
				});
				list_all_users();
			} else {
				Swal.fire({
					icon: "Error",
					title: "Oops...",
					text: "Some Problems!",
					showConfirmButton: false,
					timer: 1500
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
			$("#name_pry").val(datos.nombre);
			$("#bpm_pry").val(datos.bpm);
			$("#format_pry").val(datos.formato);
		},
		error: function(jqXhr, textStatus, errorThrown) {
			console.log(errorThrown);
		}
	});
}

function clean_gnr() {
	$("#gnrmusical").val(-1);
	$("#idpry").val("");
	$("#name_pry").val("");
	$("#format_pry").val("");
	$("#bpm_pry").val("");
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

function list_all_U() {
	$.ajax({
		url: "../php/list_users_me.php",
		type: 'post',
		data: { },
		success: function (data) {
			$("#searchuser").html(data);
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
			$("#txtidusuario").val(idusuario);
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

function user(username){
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
					url: "../php/porfile.php",
					dataType: "text",
					type: "post",
					data: { username:username },
					success: function (data) {
						$("#body").html(data);
						console.log(data);
					},
					error: function (jqXhr, textStatus, errorThrown) {
						console.log(errorThrown);
					}
				});
				
			}
		})
}

function save(){
	var idusuario = document.getElementById('txtidusuario').value;
	var name = document.getElementById('txtname').value;
	var lastname = document.getElementById('txtlastname').value;
	var username = document.getElementById('txtusername').value;
	var email = document.getElementById('txtemail').value;

	console.log(idusuario);
	$.ajax({
        url: '../php/actualizar_admin.php',
        type: 'post',
        data: {idusuario:idusuario , name:name , lastname:lastname , username:username , email:email},
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
				list_all_users();
				$("#divfrm").modal("toggle");
				limpiar_datos_user();
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

function limpiar_datos_user() {
	$('#txtidusuario').val("");
	$('#txtname').val("");
	$('#txtlastname').val("");
	$('#txtusername').val("");
	$('#txtemail').val("");
}

function delete_pistas(idpistas) {
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
				url: "../php/delete_pist.php",
				type: "post",
				data: { "idpistas": idpistas },
				success: function (data) {
					console.log(data);
					if (data == 1) {
						var URLactual = window.location;
						window.location.replace(URLactual);
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Your work has been saved',
							showConfirmButton: false,
							timer: 1500
						});
						list_all_pistas();
						
					} else {
						Swal.fire({
							icon: "Error",
							title: "Oops...",
							text: "Some Problems!"
						});
					}
				},
				error: function (jqXhr, textStatus, error) {
					console.log(error);
				}
			});
		}
	});

}


function edit_pistas_admin(idpistas){
	$.ajax({
        url: '../php/edit_pistas_admin.php',
        type: 'post',
        data: {"idpistas":idpistas},
        success: function( data ){
			var datos = JSON.parse(data);
			$("#txtpista").html(idpistas);
			$("#txtidusuario").val(datos.idusuario);
        	$("#txtusername").val(datos.nombreusuario);
        	$("#txturl").val(datos.url);
			$("#txtcodp").val(datos.idproyecto);
			$("#txtname").val(datos.nombre);
			$("#txtcoder").val(datos.idrepositorio);
			$("#txtpublic").val(datos.publico);
			$("#txtcol").val(datos.colaborativo);
        },
        error: function( jqXhr, textStatus, error ){
            console.log( error );
        }
    });
}


function save_pistas(){
	var idpistas = document.getElementById('txtpista').value;
	var idusuario = document.getElementById('txtidusuario').value;
	var username = document.getElementById('txtusername').value;
	var url = document.getElementById('txturl').value;
	var codp = document.getElementById('txtcodp').value;
	var name = document.getElementById('txtname').value;
	var coder = document.getElementById('txtcoder').value;
	var public = document.getElementById('txtpublic').value;
	var col = document.getElementById('txtcol').value;

	console.log(idusuario);
	$.ajax({
        url: '../php/actualizar_pistas_admin.php',
        type: 'post',
        data: {idpistas:idpistas,idusuario:idusuario , username:username,url:url,codp:codp,name:name ,coder:coder,public:public,col:col},
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
				list_all_users();
				$("#divfrm").modal("toggle");
				limpiar_datos_user();
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

function listar_partituras() {
	$.ajax({
		url: "../php/all_partituras.php",
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


function new_record(idproyecto) {
	var msc = document.getElementById("uploadedfile").files[0];
	var des = $("#des_pista").val();
	if (msc == undefined) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Rellene todos los campos',
			showConfirmButton: false,
			timer: 1500
		});
	} else {
		var formData = new FormData(); 
		formData.append("idproyecto", idproyecto);
		formData.append("uploadedfile", msc);
		formData.append("des_pista", des);
		$.ajax({
			url: "../php/upload_music.php",
			dataType: "text",
			type: "post",
			data: formData,
			contentType: false,
			processData: false,
			success: function (data) {
				console.log(data);
				if (data == 1) {
					var URLactual = window.location;
					window.location.replace(URLactual);
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'Your work has been saved',
						showConfirmButton: false,
						timer: 1500
					});
	
				} else if(data==5) {
					Swal.fire({
						icon: 'error',
						title: 'Formato no permitido',
						text: 'El formato no conincide con el formato del proyecto al que pertenece esta pista!',
						showConfirmButton: false,
						timer: 1500
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops',
						text: 'Algo fallado',
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
}


function delete_partituras(idpartituras) {
	$.ajax({
		url: "../php/delete_partituras.php",
		type: "post",
		data: {idpartituras:idpartituras},
		success: function(data) {
			if (data == 1) {
				$("#newrama").modal("toggle");
				Swal.fire("DELETE!", "Partitura is Delete!", "success");
				listar_partituras();
			}
		},
			error: function (jqXhr, textStatus, error) {
					console.log(error);
				}
			
			});
		}


function valcampos() {
	$('#txtname').val("");
	$('#txtlastname').val("");
	$('#txtusername').val("");
	$('#txtemail').val("");
	$('#txtpass').val("");
	$('#txtcpass').val("");
}

function delete_repo(repo) {
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
				url: "../php/delete_repo.php",
				type: "post",
				data: { idrepositorio: repo },
				success: function (data) {
					console.log(data);
					if (data == 1) {
						window.location.replace("http://localhost/theme/html/index.php");
					} else {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Some problem!"
						});
					}
				},
				error: function (jqXhr, textStatus, error) {
					console.log(error);
				}
			});
		}
	})
}

function update_repo(repo) {
	let name = $("#nombre_repo").val();
	let des = $("#about_repo").val();
	let priv = 1;
	if ($("#privado:checked").val() == 0) {
		priv = 0;
	}
	$.ajax({
		url: "../php/update_repo.php",
		type: "post",
		data: { idrepositorio: repo, name: name, public: priv, des:des },
		success: function (data) {
			console.log(data);
			if (data == 1) {
				var URLactual = window.location;
				window.location.replace(URLactual);
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Colaborador agregado',
					showConfirmButton: false,
					timer: 1500
				});
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


function new_colab(idcolab, repo) {
	$.ajax({
		url: "../php/new_colab.php",
		type: "post",
		data: { idrepositorio: repo, idcolab : idcolab },
		success: function (data) {
			console.log(data);
			if (data == 1) {
				var URLactual = window.location;
				window.location.replace(URLactual);
				
			} else {
				if (data == 3) {
					Swal.fire({
						icon: "info",
						title: "Limite de colaboradores",
						text: "Para agregar a mas personas a su repositorio conviertase en usuario premium",
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Convertirme en premium'
					}).then((result) => {
						if (result.value) {
							window.location.replace("http://localhost/theme/html/premium.php");
						}
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Some problem!"
					});
				}
				
			}
		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});	
}

function list_pistas(pry) {
	$.ajax({
		url: "../php/list_records.php",
		type: "post",
		data: { idpry: pry},
		success: function (data) {
			$("#myproyect").html(data);
		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});	
}

function list_info_pry(pry){
	$.ajax({
		url: "../php/list_info_pry.php",
		type: "post",
		data: { idpry: pry },
		success: function (data) {
			console.log(data);
			$("#infopry").html(data);
		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});	
}

function culqi() {
	if (Culqi.token) { // ¡Objeto Token creado exitosamente!
		var token = Culqi.token.id;
		let email = Culqi.token.email;
		$.ajax({
			url: "../php/premium_user.php",
			type: "post",
			data: { token: token, email: email },
			dataType: 'JSON',
			success: function (data) {
				console.log(data);
				if (data == 1) {
					window.location.replace('http://localhost/theme/html/suscripcion.php');
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'FELICIDADES ERES PREMIUM',
						showConfirmButton: false,
						timer: 1500
					});
				} 
				else {
					Swal.fire({
						icon: "error",
						title: "Errores en el pago",
						text: "Se cometerieron algunos errores en el pago"
					});
					
				}
			},
			error: function (jqXhr, textStatus, error) {
				console.log(error);
			}
		});	
	} else { // ¡Hubo algún problema!
		// Mostramos JSON de objeto error en consola
		console.log(Culqi.error);
		alert('you fool');
		alert(Culqi.error.user_message);
	}
}

function agregar_customer() {
	let phone_number = $("#phone_number").val();
	let last_name = $("#last_name").val();
	let first_name = $("#first_name").val();
	let address = $("#address").val();
	let address_city = $("#address_city").val();
	let countrycod = $("#country_code").val();
	let email = $("#email").val();
	if (phone_number.length < 0 ||
		last_name.length < 0 ||
		first_name.length < 0 ||
		address.length < 0 ||
		address_city.length < 0 ) {
		Swal.fire({
			icon: "error",
			title: "Rellene los campos",
			text: "Se cometerieron algunos errores "
		});
	} else {
		$.ajax({
			url: "../php/customer_register.php",
			type: "post",
			data: { phone_number: phone_number, last_name: last_name, first_name: first_name, address: address, address_city: address_city, country_code: countrycod, email: email },
			success: function (data) {
				alert(data.merchant_message);
				alert(data.capture);
				console.log(data);
				if (data == 1) {
					$("#myModal").modal("toggle");
					$("#phone_number").val("");
					$("#last_name").val("");
					$("#first_name").val("");
					$("#address").val("");
					$("#address_city").val("");
					$("#country_code").val("");
					$("#email").val("");
					suscripcion();
				}
			},
			error: function (jqXhr, textStatus, error) {
				console.log(error);
			}
		});
		
	}
}
Culqi.publicKey = 'pk_test_b074d0UkWinAlXXq';
Culqi.settings({
	title: 'Shart',
	currency: 'PEN',
	description: 'Subscripcion premium',
	amount: 30 * 100
});
// Usa la funcion Culqi.open() en el evento que desees
function suscripcion() {
	// Abre el formulario con las opciones de Culqi.settings
	Culqi.open();
	e.preventDefault();
}

function sharewithme() {
	$.ajax({
		url: "../php/list_shared.php",
		type: "post",
		data: {},
		success: function (data) {
			console.log(data);
			$("#colum1").html(data);
		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

function delete_suscripcion() {
	$.ajax({
		url: "../php/delete_premium.php",
		type: "post",
		data: {},
		success: function (data) {
			console.log(data);
			if (data = 1) {
				
				window.location.replace('http://localhost/theme/html/premium.php');
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Colaborador agregado',
					showConfirmButton: false,
					timer: 1500
				});
			} else {
				Swal.fire({
					icon: "error",
					title: "Errores en el pago",
					text: "Se cometerieron algunos errores en el pago"
				});
			}
		},
		error: function (jqXhr, textStatus, error) {
			console.log(error);
		}
	});
}

