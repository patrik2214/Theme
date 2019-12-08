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
          <div class="showback col-lg-9 col-md-9 col-sm-9 mb center-centered">
          <h3><i class="fa fa-angle-right"></i> Discover Some People That love the Music like you</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		
					<!-- 1st ROW OF PANELS -->
					<div class="row">
						<!-- TWITTER PANEL -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="twitter-panel pn">
								<i class="fa fa-twitter fa-4x"></i>
								<p>SHART is here! Show us your talent</p>
								<p class="user">@SHART_LOVEyourMusic</p>
							</div>
						</div><!-- /col-md-4 -->
						
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>TOP USER</h5>
								</div>
								<p><img src="../assets/img/marina.jpg" class="img-circle" width="50"></p>
								<p><b>Marina and the Dimonds</b></p>
									<div class="row">
										<div class="col-md-6">
											<p class="small mt">MEMBER SINCE</p>
											<p>2019</p>
										</div>
										<div class="col-md-6">
											<p class="small mt">TOTAL SPEND</p>
											<p>$ 15 000,60</p>
										</div>
									</div>
							</div>
						</div><!-- /col-md-4 -->
						
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
							<!-- INSTAGRAM PANEL -->
							<div class="instagram-panel pn">
								<i class="fa fa-instagram fa-4x"></i>
								<p>@THISISYOU<br/>
									5 min. ago
								</p>
								<p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
							</div>
						</div><!-- /col-md-4 -->
					</div><!--/END 1ST ROW OF PANELS -->
					
					<!-- 2ND ROW OF PANELS -->
					<div class="row">
						<!-- TODO PANEL -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
                        <div class="white-panel pn">
							<div class="white-header">
									<h5>TOP USER</h5>
								</div>
								<p><img src="../assets/img/aurora.jpg" class="img-circle" width="50"></p>
								<p><b>Aurora</b></p>
									<div class="row">
										<div class="col-md-6">
											<p class="small mt">MEMBER SINCE</p>
											<p>2019</p>
										</div>
										<div class="col-md-6">
											<p class="small mt">TOTAL SPEND</p>
											<p>$ 10 000,60</p>
										</div>
									</div>
							</div>
						</div><!--/col-md-4 -->
						
						<!-- PROFILE 01 PANEL -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="content-panel pn">
								<div id="profile-01">
									<h3>Sharon Holmes</h3>
									<h6>Dummer</h6>
                                </div>
                                <br>
								<div class="centered">
									<h6><i class="fa fa-envelope"></i><br/>SHARON@SHARTTHEME.COM</h6>
								</div>
							</div><!--/content-panel -->
						</div><!--/col-md-4 -->
						
						<!-- PROFILE 02 PANEL -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="content-panel pn">
								<div id="profile-02">
									<div class="user">
										<img src="../assets/img/friends/fr-06.jpg" class="img-circle" width="80">
										<h4>DJ SHERMAN</h4>
									</div>
								</div>
								<div class="pr2-social centered">
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
								</div>
							</div><!--/panel -->
						</div><!--/ col-md-4 -->
					</div><!--/END 2ND ROW OF PANELS -->
					
					<!-- 3RD ROW OF PANELS -->
					<!-- Product Panel -->
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
                        <div class="content-panel pn">
								<div id="spotify">
									<div class="sp-title">
										<h3>LORDE</h3>
									</div>
									<div class="play">
										<i class="fa fa-play-circle"></i>
									</div>
								</div>
								<p class="followers"><i class="fa fa-user"></i> 576,000 FOLLOWERS</p>
							</div>
						</div><!--/col-md-4 -->
						
						<!-- Spotify Panel -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
                            <div class="content-panel pn">
								<div id="profile-02">
									<div class="user">
										<img src="../assets/img/jai.jpg" class="img-circle" width="80">
										<h4>Jai Chao</h4>
									</div>
								</div>
								<div class="pr2-social centered">
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
								</div>
							</div><! --/panel -->
						</div><!--/col-md-4-->
					
						<!-- Blog Panel -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
                        <div class="white-panel pn">
							<div class="white-header">
									<h5>TOP USER</h5>
								</div>
								<p><img src="../assets/img/nani.jpg" class="img-circle" width="50"></p>
								<p><b>Nani Mia</b></p>
									<div class="row">
										<div class="col-md-6">
											<p class="small mt">MEMBER SINCE</p>
											<p>2019</p>
										</div>
										<div class="col-md-6">
											<p class="small mt">TOTAL SPEND</p>
											<p>$ 8 000,60</p>
										</div>
									</div>
							</div>
						</div><!-- /col-md-4-->
					</div><!-- END 3RD ROW OF PANELS -->
		
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


