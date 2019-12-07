<header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>SHART</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <input type="search" class="form-control" name="buscargeneral" id="buscargeneral" onkeyup="" placeholder="Busque en Shart" >
            </div>
            <div class="nav pull-right top-menu notify-row">
                <!-- <div >
                    <a class="btn btn-secondary dropdown-toggle" href="myperfil.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        top-menu n
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" onclick="close_sesion()" href="#">Logout</a>
                    </div>
                </div> -->
                <!-- <form action="../php/close_session.php" method="post"> -->
            	    <!-- <ul class="dropdown nav pull-right top-menu" >
                        <li><a href="myperfil.php"></a></li>
                        <li> <button type="submit" class="logout" >Logout</button> </li>
            	    </ul> -->
                <!-- </form> -->
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-theme04 dropdown-toggle" data-toggle="dropdown">
                    <?php echo $_SESSION['usuario']; ?><span class="caret"></span>
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