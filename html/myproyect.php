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
