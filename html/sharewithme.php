<?php
session_start();
if(!isset($_SESSION['idusuario'])) header("location: login.php");
if($_SESSION['usertype']==3) header("location: myadmin.php" );
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

  </head>
<body>
    <section id="container">
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
      <section id="main-content">
        <section class="wrapper site-min-height">   
            <div class="row mt ">
                <div class="col-lg-12">
                    <div class="showback">
                        <!-- Barra de busqueda -->
                        <form >
                            <input type="search" name="busqueda" class="form-control" id="busqueda" onkeyup="buscar()" placeholder="Ingrese repositorio a buscar" />
                        </form>
                    </div><!-- /showback -->
                </div>
                <div class="col-lg-12 col-md-12 " id="colum1" >      			
                        
                </div><!-- /col-lg-6 -->    
            </div><!--/ row -->   
        </section>
      </section>
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <!-- <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script> -->
    <script src="../assets/js/jquery.sparkline.js"></script>
    
    <script src="../assets/js/chart-master/Chart.js"></script>
    

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <script type="text/javascript">
		window.load = sharewithme();
	</script>
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../assets/js/sparkline-chart.js"></script>    
	<script src="../assets/js/zabuto_calendar.js"></script>	
    
    <!-- sweet alert for alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    
</body>
</html>