<?php
session_start();
if(!isset($_SESSION['idusuario'])) header("location: login.php");
if($_SESSION['usertype']!=3) header("location: ../php/close_session.php" )
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
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
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
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
    <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>SHART</b></a>
            <!--logo end-->
            
            <div class="nav pull-right top-menu notify-row">
                <!-- <div >
                    <a class="btn btn-secondary dropdown-toggle" href="myperfil.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        top-menu n
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" onclick="close_sesion()" href="#">Logout</a>
                    </div>
                </div> -->
                <!-- <form action="../php/close_session.php" method="post"> -->
            	    <!-- <ul class="dropdown nav pull-right top-menu" >
                        <li><a href="myperfil.php"></a></li>
                        <li> <button type="submit" class="logout" >Logout</button> </li>
            	    </ul> -->
                <!-- </form> -->
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-theme04 dropdown-toggle" data-toggle="dropdown">
                    <?php echo $_SESSION['usuario']; ?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="premium.php">Be premium</a></li>
                    <li><a href="config.php">Editar mi perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="../php/close_session.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
      <!--sidebar end-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                    <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                    
              	  	
                  <li class="mt">
                      <a href="myadmin.php">
                          <span>Mantenimiento usuario</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                     <a href="admi_repo.php">
                          <span>Mantenimiento repositorios</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="admi_pista.php">
                          <span>Mantenimiento pistas</span>
                      </a>
                  </li>
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">

        <div class="modal fade" id="newrama" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
        <div>
		<div class="modal fade" id="divfrm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">User</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form>
                    <div class="form-group">
						<label for="txtpista">Code</label>
						<label class="form-control" name="txtpista" id="txtpista"></label>
                    </div>
                    <div class="form-group">
						<label for="txtidusuario">User Code</label>
						<label type="text" class="form-control" name="txtidusuario" id="txtidusuario"></label>
                    </div>
                    <div class="form-group">
						<label for="txtusername">Username</label>
						<label type="text" class="form-control" name="txtusername" id="txtusername"></label>
                    </div>
					<div class="form-group">
						<label for="txturl">URL</label>
						<input type="file" class="form-control" name="txturl" id="txturl">
					</div>
					<div class="form-group">
						<label for="txtcodp">Proyect Code</label>
						<input type="text" class="form-control" name="txtcodp" id="txtcodp">
					</div>
					<div class="form-group">
						<label for="txtusername">Name</label>
						<input type="text" class="form-control" name="txtname" id="txtname">
                    </div>
                    <div class="form-group">
						<label for="txtemail">Repositorie Code</label>
						<input type="text" class="form-control" name="txtcoder" id="txtcoder">
                    </div>
                    <div class="form-group">
                        <label for="txtpublic">Public</label>
                        <select name="txtpublic" class="form-control" id="txtpublic">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
					</div>
					<div class="form-group">
                        <label for="txtcol">Colaborator</label>
                        <select name="txtcol" class="form-control" id="txtcol">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-primary" onclick="save()">Save</button>
		      </div>
		    </div>
		  </div>
        </div>
	</div>
            <div class='col-md-12'>
                <div class='content-panel'>
                <table class='table table-striped table-advance table-hover'>
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Url</th>
                            <th>Cod.Proyecto</th>
                            <th>Nombre</th>
                            <th>Cod.Repo</th>
                            <th>Publico</th>
                            <th>Colaborativo</th>
                            <th>Cod.Usuario</th>
                            <th>Usuario</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id='colum1'>
                    </tbody>
                </table>
                </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
            
		</section><!-- /wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
    </section>
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2019 - Shart.com
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script type="text/javascript">
        window.load = list_all_pistas();
    </script>

  </body>
</html>