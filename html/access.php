<?php
session_start();
if(!isset($_SESSION['usuario'])) header("location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
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
	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post" action="../php/login_validation.php">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
					<?php
						$variable = isset($_GET['mensaje']) ? $_GET['mensaje'] : null ;			                                                               
						if($variable=='errorCredenciales') {
					?>
						<div class="alert alert-danger" role="alert">
							<p>La clave no es correcta</p>
						</div>
						
					<?php
						}
					?> 
                    <!-- <input type="text" class="form-control" id="usuario" name="usuario" placeholder="User ID" autofocus> -->
					<p class="h3 text-center">
						<?php
                      		echo $_SESSION['usuario']; 
					  	?>
					</p>
		            <br>
                    <input type='password' id='pass' name='pass' class='form-control' placeholder='Password' autofocus>
                    <label class='checkbox'>
                        <span class='pull - right' > 
                            <a data - toggle='modal' href = "#myModal" > Forgot Password ?</a >
                            
                        </span >
                    </label>
                    <button class='btn btn-theme btn-block'  type='submit'><i class='fa fa-lock'></i> INGRESAR</button>
					
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div>
		
		        </div>
		
		        
		
		      </form>	  	

	  	</div>
	  </div>
	  	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Forgot Password ?</h4>
					</div>
					<div class="modal-body">
						<p>Enter your e-mail address below to reset your password.</p>
						<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
						<button class="btn btn-theme" type="button">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<!-- modal -->  	
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
    

               
