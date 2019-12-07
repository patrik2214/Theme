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
    <script
      src="https://kit.fontawesome.com/fa723842a6.js"
      crossorigin="anonymous"
    ></script>
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
      <section id="main-content">
        <div class="wrapper" >
            
            <div id="myrepository" class="table">
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
                            <input type="hidden" name="idpry" id="idpry" value="">
                            <h4>Nombre del proyecto:</h4>
                            <input type="text" name="name_pry" class="form-control" id="name_pry" >
                            <h4>Genero musical</h4>
                            <select class="cbx form-control form-control-lg" name="gnrmusical" id="gnrmusical"> 
                            </select>
                            <h4>BPM del proyecto:</h4>
                            <input type="text" name="bpm_pry" class="form-control" id="bpm_pry" >
                            <h4>Formato del proyecto:</h4>
                            <input type="text" name="format_pry" class="form-control" id="format_pry" >

                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="clean_gnr()" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="new_pry(<?php echo $_GET['repo']; ?>)" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                </div>
            </div>    
            <div class="modal fade" id="new_colab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar colaboradores a tu trabajo</h4>
                    </div>
                    <div class="modal-body">
                        <form >
                            <input type="search" name="busqueda" onkeyup="userlike(<?php echo $_GET['repo']; ?>)" class="form-control" id="search" placeholder="Busque a su colaborador" />
                        </form>
                        <div class="content-panel">
                            <table class="table table-hover">                              
                                <tbody id="searchuser">

                                </tbody>
                            </table>
                        </div><!--/content-panel -->
                    </div>
                    <div class="modal-footer">
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
		window.load = view_repo(<?php
                    echo $_GET['repo'];
              ?>);
    </script>
    
    <!-- sweet alert for alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <!--script for this page-->
    
  <!-- <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script> -->
  <script type="text/javascript">
    	 $(document).ready(function (){
            $.ajax({
                url: "../php/listar_generos.php",
                type: "post",
                data: {},
                success: function(data) {
                    $("#gnrmusical").html(data);
                    $("#home-tab").trigger('click');
                },
                error: function(jqXhr, textStatus, error) {
                    console.log(error);
                }
            });
        });
    </script>

  </body>
</html>
