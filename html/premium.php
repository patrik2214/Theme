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

    <script src="../assets/js/chart-master/Chart.js"></script>
    
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
        <section class="wrapper site-min-height">  
            <div class="showback">
                <h1 class="text-center"><b>Descubre los beneficios de ser PREMIUM</b></h1>
                <h3 class="text-center"> Se un usuario premium y disfruta de todos los beneficios que Shart te puede ofrecer para una mejor administracion de 
                tus proyectos musicales. Conectate con el mundo a traves de tu musica y haste famoso con ella</h3>
            </div>
            <div class='col-lg-4 col-md-4 col-sm-4 mb'>
                <!-- WHITE PANEL - TOP USER -->
                <div class='white-panel pn'>
                <br>
                    <img class="text-center" src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" width="260" alt="" srcset="">
                    <h4><b>Repositorios privados</b></h4>
                    <h6>Comparte tus repositorios privados con mas de tres personas</h6>
                </div>
            </div> 
            <div class='col-lg-4 col-md-4 col-sm-4 mb'>
                <!-- WHITE PANEL - TOP USER -->
                <div class='white-panel pn'>
                <br>
                    <img class="text-center" src="https://images.unsplash.com/photo-1513829596324-4bb2800c5efb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" width="260" alt="" srcset="">
                    <h4><b>Repositorios privados</b></h4>
                    <h6>Comparte tus repositorios privados con mas de tres personas</h6>
                </div>
            </div> 
            <div class='col-lg-4 col-md-4 col-sm-4 mb'>
                <!-- WHITE PANEL - TOP USER -->
                <div class='white-panel pn'>
                <br>
                    <img class="text-center" src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" width="260" alt="" srcset="">
                    <h4><b>Repositorios privados</b></h4>
                    <h6>Comparte tus repositorios privados con mas de tres personas</h6>
                </div>
            </div> 
            <div class="col-md-12 ">
                <div class='showback'>
                    <h3 class="text-center"><b>VIVE LA EXPERIENCIA PREMIUM</b></h3>
                    <h3 class="text-center">Aumenta tu productividad con las opciones premium. </h3>
                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#buyButton">Ser premium</button>
                </div>
            </div>

            <div class="modal fade" id="buyButton"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div>
                                <label>
                                <span>Correo Electrónico</span>
                                <input type="text" size="50" data-culqi="card[email]" id="card[email]">
                                </label>
                            </div>
                            <div>
                                <label>
                                <span>Número de tarjeta</span>
                                <input type="text" size="20" data-culqi="card[number]" id="card[number]">
                                </label>
                            </div>
                            <div>
                                <label>
                                <span>CVV</span>
                                <input type="text" size="4" data-culqi="card[cvv]" id="card[cvv]">
                                </label>
                            </div>
                            <div>
                                <label>
                                <span>Fecha expiración (MM/YYYY)</span>
                                <input size="2" data-culqi="card[exp_month]" id="card[exp_month]">
                                <span>/</span>
                                <input size="4" data-culqi="card[exp_year]" id="card[exp_year]">
                                </label>
                            </div>
                            <button class="btn btn-primary" id="bePremium">Ser premium</button>
                        </form>
                    </div>
                </div>
            </div> 
            <!-- modal-end -->

                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
        </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 - Shart.com
              <a href="index.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
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


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    <script type="text/javascript">
		//window.load = inicio();
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
    
    <script type="text/javascript">
    	 $(document).ready(function (){
            $.ajax({
                url: "../php/listar_generos.php",
                type: "post",
                data: {},
                success: function(data) {
                    $("#gnrmusical").html(data);
                },
                error: function(jqXhr, textStatus, error) {
                    console.log(error);
                }
            });
        });
    </script>
    
    <!-- Incluye Culqi Checkout en tu sitio web-->
    <!-- <script src="https://checkout.culqi.com/js/v3"></script> -->
    <!-- Incluyendo .js de Culqi JS -->
    <script src="https://checkout.culqi.com/v2"></script>
    <script>
        // Configura tu llave pública
        Culqi.publicKey = 'pk_test_b074d0UkWinAlXXq';
        Culqi.init();
        // Configura tu Culqi Checkout
        // Culqi.settings({
        //     title: 'Shart',
        //     currency: 'PEN',
        //     description: 'Subscripcion premium',
        //     amount: 30*100
        // });
        // Usa la funcion Culqi.open() en el evento que desees
        $('#bePremium').on('click', function(e) {
            // Abre el formulario con las opciones de Culqi.settings
            Culqi.createToken();
            e.preventDefault();
        });
    </script>


  </body>
</html>
