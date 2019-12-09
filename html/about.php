<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SHART</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <script src="../assets/js/chart-master/Chart.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    
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
      <!--header start -->
       <header class="header black-bg text-center">
            <a href="index.php" class="logo"><b>SHART</b></a>

            <div class="col-sm-3"></div>
            <a href="home.php" class="logo"><h5>Home</h5></a>
            <div class="col-sm-1"></div>
            <a href="about.php" class="logo"><h5>About</h5></a>
            <div class="col-sm-1"></div>
            <a href="galery.php" class="logo"><h5>Gallery</h5></a>
            <div class="col-sm-1"></div>
            <a href="register.php" class="logo"><h5>Register</h5></a>

            <ul class=" nav pull-right top-menu" >
                <li ><a class="logout"  href="login.php">Iniciar sesion</a></li>
            </ul>
        </header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="col-lg-1 col-md-1 col-sm-1 mb"></div>
          <div class="showback col-lg-8 col-md-8 col-sm-8 mb">
            <h1 class="text-center"><b>Conoce más Acerca de Nosotros</b></h1>
            <h3 class="text-center">Queremos que Tu Música llegue a Todos Lados</h3>

            <br>
            <br>

            <div class='black-bg col-lg-12 col-md-12 col-sm-12 mb text-center'></div>   
            <div class='black-bg col-lg-12 col-md-12 col-sm-12 mb text-center'></div>  

            <div class="row">
                <div class='col-lg-6 col-md-6 col-sm-6 mb text-center'>
                    <!-- WHITE PANEL - TOP USER -->
                    <div class='white-panel pn'>
                    <br>
                        <img class="text-center" src="https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" width="260" alt="" srcset="">
                        <br>
                        <h4><b>Directora</b></h4>
                        <h6>Sara Benel Ramirez</h6>
                    </div>
                </div>   
                <div class='col-lg-6 col-md-6 col-sm-6 mb'>
                    <!-- WHITE PANEL - TOP USER -->
                    <div class='white-panel pn'>
                    <br>
                        <img class="text-center" src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" width="260" alt="" srcset="">
                        <br>
                        <h4><b>Sub Directora</b></h4>
                        <h6>Paola Patricia Castro</h6>
                    </div>
                </div> 
            </div> 

        </div>           
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
            </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              @2019 - Shart.com
              <a class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../assets/js/sparkline-chart.js"></script>    
	<script src="../assets/js/zabuto_calendar.js"></script>	
	
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
	
	</style>

  </body>
</html>


