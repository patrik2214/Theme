<?php
session_start();
if(isset($_SESSION['idusuario'])) header("location: index.php");
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
	<section class="container site-min-height">
	
		<!-- SCRIPT FOR LOGIN WITH FACEBOOK -->
		<!-- <div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0&appId=538250367014752"></script> -->
		<header class="header black-bg">
			<a href="index.php" class="logo"><b>SHART</b></a>
			<div class="nav pull-right top-menu ">
				<!-- <form action="../php/close_session.php" method="post"> -->
					<ul class=" nav pull-right top-menu" >
						<li ><a class="logout"  href="register.php">Registrarse</a></li>
						<!-- <li> <button type="submit" class="logout" >Logout</button> </li> -->
					</ul>
				<!-- </form> -->
				
			</div>
		</header>
		<!-- **********************************************************************************************************************************************************
		MAIN CONTENT
		*********************************************************************************************************************************************************** -->
		<form class="form-login " method="post" class="border border-secondary rounded p-5" action="../php/user_validation.php" >
			<h2 class="form-login-heading">sign in now</h2>
			<div class="login-wrap" >
				<?php
					$variable = isset($_GET['mensaje']) ? $_GET['mensaje'] : null ;			                                                               
					if($variable=='errorCredenciales') {
				?>
					<div class="alert alert-danger" role="alert">
						<p>Usuario no encontrado</p>	
					</div>
					
				<?php
					}
				?> 
				<input type="text" class="form-control" id="usuario" name="usuario" placeholder="User ID" autofocus>
				<br>
				<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGUIENTE</button>
				<hr>
				<div class="login-social-link centered">
					<p>or you can sign in via your social network</p>
					<!-- <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button> -->
					<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div>
				</div>
				<div class="registration">
					Don't have an account yet?<br/>
					<a class="" href="register.php">
						Create an account
					</a>
				</div>
	
			</div>
		</form>	
		</div>
	</section>
	<footer class="site-footer">
		<div class="text-center">
			@2019 - Shart.com
			<a class="go-top">
				<i class="fa fa-angle-up"></i>
			</a>
		</div>
	</footer>
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
	<script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
    <script>
        // $.backstretch("../assets/img/login-bg.jpg");
        // $.backstretch("../assets/img/back_login.jpg");
    </script>

  </body>
</html>
