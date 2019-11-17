<?php

if(isset($_POST['submit'])){
    $name = $_POST['txtname'];
    $lastname = $_POST['txtlastname'];
    $username = $_POST['txtusername'];
    $email = $_POST['txtemail'];
    $password = $_POST['txtpass'];
    $cpassword = $_POST['txtcpass'];

    //Subir la Imagen
    //Creamos una variable para ver si se sube o no el archivo
    $imgload=true;

    //Seteamos nombre, tipo y tamaño del archivo
    $file_name=$_FILES['img']['name'];
    $img_size=$_FILES['img']['size'];
    $file_type=$_FILES['img']['type'];

    //verificamos tamaño
    if ($img_size>200000){
        $imgload=false;
    }
    //verificamos que solo sea imagen
    if (!($file_type =="image/jpeg" or $file_type=="image/gif")){
        // Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
        $imgload=false;
    }
    //seteamos la ruta de la carpeta
    $add="uploads/$file_name";
    //lo movemos del temporal a la carpeta
}

?>

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
      <!--header start-->
      <header class="header black-bg">
            <!--logo start-->
            <a class="logo"><b>SHART</b></a>
            <!--logo end-->
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Login</a></li>
            	</ul>
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
              
              	  <p class="centered"><a href="profile.html"><img src="../assets/img/logo.png" class="img-circle" width="60"></a></p>
              	  
              	  	
                    <li class="sub-menu">
                      <a href="home.php">
                      <i class="fa fa-tasks"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a  href="about.php" >
                      <i class="fa fa-th"></i>
                          <span>About As</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="register.php" >
                      <i class="fa fa-cogs"></i>
                          <span>Register</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="galery.php" >
                      <i class="fa fa-book"></i>
                          <span>Gallery</span>
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
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Sing In Here !</h3>

            <div class="col-lg-8 col-md-8 col-sm-8 mb">
		    <form  action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="txtname" id="txtname" value="<?php if(isset($name))echo $name ?>"
                    placeholder="Enter here">
                </div>
				<div class="form-group">
					<label>Last Name</label>
                    <input type="text" class="form-control" name="txtlastname" id="txtlastname" value="<?php if(isset($lastname))echo $lastname ?>"
                    placeholder="Enter here">
				</div>
				<div class="form-group">
					<label>Username</label>
                    <input type="text" class="form-control" name="txtusername" id="txtusername" value="<?php if(isset($username))echo $username ?>"
                    placeholder="Enter here">
				</div>
				<div class="form-group">
					<label>Email</label>
                    <input type="email" class="form-control" name="txtemail" id="txtemail" value="<?php if(isset($email))echo $email ?>"
                    placeholder="Enter here">
                </div>
				<div class="form-group">
					<label>Contraseña</label>
                    <input type="password" class="form-control" name="txtpass" id="txtpass" value="<?php if(isset($password))echo $password ?>"
                    placeholder="Enter here">
				</div>
                <div class="form-group">
					<label>Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="txtcpass" id="txtcpass" value="<?php if(isset($cpassword))echo $cpassword ?>"
                    placeholder="Enter here">
				</div>
				<div class="form-group">
					<label for="uploadedfile">Upload a Picture</label>
					<input type="file" class="form-control-file" name="img" id="img" >
                </div>

                <div class="g-recaptcha" data-sitekey="6LfpPboUAAAAAC2yEYpndy3nwCo3k44NmhIkGeJP"></div><br>
                <div class="form-group">
                   <button  class="btn btn-success" type="submit" name="submit">Guardar</button><br>
                </div>
        
                <?php
                    include("../php/validate.php");
                ?>
			</form>
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
              @DerechosReservadosSHART-2019
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
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
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
    

  </body>
</html>


