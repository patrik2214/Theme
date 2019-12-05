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
     <script
      src="https://kit.fontawesome.com/fa723842a6.js"
      crossorigin="anonymous"
    ></script>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <!-- <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
        
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
            <div class="nav notify-row" id="top_menu">
                
            </div>
            <div class="nav pull-right top-menu notify-row">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-theme04 dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['usuario']; ?>  <span class="caret"></span>
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
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                    <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                    
              	  	
                <li class="mt">
                    <a href="index.php">
                        <i class="fas fa-compact-disc"></i>
                        <span>Mis repositorios</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-desktop"></i>
                        <span>Search</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="">User</a></li>
                        <li><a  href="">Repositorie</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="config.php" >
                        <i class="fa fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="premium.php" >
                        <i class="fa fa-book"></i>
                        <span>Be Premium</span>
                    </a>
                </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content" >
        <div class="wrapper" >
            <div id="infopry">
            </div>
            <hr>
            <h4><b>Sube tu cancion o una pista </b></h4>
            <form enctype="multipart/form-data">
                <label for="uploadedfile"> <h4><b><i class="fas fa-file-audio"></i> Archivos</b></h4> </label>
                <input type="file" name="uploadedfile" id="uploadedfile" />
                <br>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="des_pista"> <h4><b>Descripcion</b> *Opcional</h4> </label>
                    <textarea type="text" class="form-control col-lg-6" rows="3" name="des_pista" id="des_pista" placeholder="Describe tu pista para que los demas se enteren"></textarea>
                </div>
                <br>                
                <!-- <input class="btn btn-primary btn-lg btn-block" onclick='new_record()' type="submit" name="uploadBtn" value="Upload" /> -->
                <button type="button" onclick="new_record(<?php echo $_GET['pry']; ?>)" class="btn btn-primary btn-lg btn-block">Subir</button>
            </form>
            <hr>
            <h3>Tus pistas</h3>
            <div id="myproyect">
                <!-- <div class='showback'>
                    <h4 class="card-title">Este campo falta en la BD</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Este campo falta en la BD</h6>                         
                    <audio id='tracks' controls></audio>
                </div> -->
            </div>

            <div class="modal fade" id="new_rama" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar una nueva version de tu cancion</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h4>Genero musical</h4>
                            <input type="hidden" name="idpry" id="idpry" value="">
                            <select class="cbx form-control form-control-lg" name="gnrmusical" id="gnrmusical"> 
                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="clean_gnr()" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="new_pry(<?php echo $_GET['repo']; ?>)" class="btn btn-primary">Crear</button>
                    </div>
                </div>
                </div>
            </div>    
             

        </div><!-- wrapper end --> 
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 - Shart.com
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <script type="text/javascript">
		window.load = list_pistas(<?php
                    echo $_GET['pry'];
              ?>);
        window.load = list_info_pry(<?php
                    echo $_GET['pry'];
              ?>);
    </script>
    
    <!-- sweet alert for alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <script type="text/javascript">

    </script>

  </body>
</html>
