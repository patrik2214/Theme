<?php
session_start();
if(!isset($_SESSION['idusuario'])) header("location: login.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHART</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <script
      src="https://kit.fontawesome.com/fa723842a6.js"
      crossorigin="anonymous"
    ></script>
    <!-- <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https..//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https..//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->    
  </head>
  <body>
    <section id="container" >
       <?php include_once("nav.php") ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
       <?php include_once("aside.php") ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">   
                <div class="row mt">
                <div class="modal fade" id="divfrm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Change Your Password</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form>
					<div class="form-group">
						<label for="txtname">New Password</label>
						<input type="password" class="form-control" name="pass" id="pass">
					</div>
					<div class="form-group">
						<label for="txtlastname">Confirm</label>
						<input type="password" class="form-control" name="con" id="con">
					</div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-primary" onclick='change_pass()'>Save</button>
		      </div>
		    </div>
		  </div>
        </div>
  </div>
                <div class="col-lg-1  col-md-1"></div>
          		    <div class="col-lg-4  col-md-4">
                        <div class="form-group mt-4">
                            <label class=" position-relative" for="btnSubirFoto" width="300">
                                <img class="img-circle" id='userpic' width="300" alt="">
                                <div id="editar-hover" width="300">
                                    <i class="far fa-edit"></i>
                                </div>
                            </label>
                            <input type="file" name="foto" id="btnSubirFoto" width="300">
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6">
                        <!-- <div class='row'>
                            <div class='col-lg-2 col-md-2 col-sm-2 mb'>
                                <br>
                                <br>
                                <input type='file' class='form-control-file' name='img' id='img' >
                            </div>
                        </div> -->
                        <div class='row'>
                            <div class='col-lg-2 col-md-2 col-sm-2 mb'>
                                <button  class='btn btn-success' type='submit' onclick='modify_user()'>Save All Changes</button><br>
                            </div>
                            <div class='col-lg-1 col-md-1 col-sm-1 mb'></div>

                            <div class='col-lg-2 col-md-2 col-sm-2 mb'>
                                <button  class='btn btn-info' type='submit' data-toggle="modal" data-target="#divfrm"  >Change Password</button><br>
                            </div>
                            <div class='col-lg-1 col-md-1 col-sm-1 mb'></div>

                            <div class='col-lg-2 col-md-2 col-sm-2 mb'>
                                <button  class='btn btn-danger' type='submit' onclick='delete_us()'>Inactive Account</button><br>
                            </div>
                        </div>
                        <div class="form-panel">
                            <form id="user_data" action="" method="post">
                                <div class='form-group'>
                                    <input type="hidden" name="idusuario" id="idusuario" value="">
                                    <p>Name</p>
                                    <input type='text' class='form-control' name='txtname' id='txtname'  >
                                </div>
                                <div class='form-group'>
                                    <p>Last Name</p>
                                    <input type='text' class='form-control' name='txtlastname' id='txtlastname' >
                                </div>
                                <div class='form-group'>
                                    <p>UserName</p>
                                    <input type='text' class='form-control' name='username' id='username' >
                                </div>
                                <div class='form-group'>
                                    <p>Email</p>
                                    <input type='email' class='form-control' name='txtemail' id='txtemail'  >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </section>
    </section>
      <!-- script de la casa -->
    <!-- <script src="../assets/user.js"></script> -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>
    
    <script src="../assets/js/chart-master/Chart.js"></script>
    

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <script type="text/javascript">
		window.load = list_user_info();
	</script>
 
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../assets/js/sparkline-chart.js"></script>    
	<script src="../assets/js/zabuto_calendar.js"></script>	
    
    <!-- sweet alert for alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
    <style>
        /* #userpic{
            width: 280px;
            height: 280px;
            vertical-align: center;
            display: flex;
        } */
    </style>
    </body>
</html>