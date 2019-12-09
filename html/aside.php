<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
            <p class="centered"><a href="profile.html"><img src="../assets/img/varias.png" class="img-circle" width="60"></a></p>
            <h3 class="centered">Bienvenido!</h3>
            
            <li class="mt">
                <a href="index.php">
                <i class="fas fa-compact-disc"></i>
                <span>Mis repositorios</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>Explorar</span>
                </a>
                <ul class="sub">
                    <li><a  href="repoexplorer.php">Repositorios populares</a></li>
                </ul>
                <ul class="sub">
                    <li><a  href="search_user.php">Buscar Usuarios</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="sharewithme.php" >
                    <i class="fas fa-user-friends"></i>
                    <span>Compartidos conmigo</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="config.php" >
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            <?php 
            require_once("../php/conexion.php");
            $user = $_SESSION['idusuario'];
            $sql="SELECT * from usuario where idusuario = $user";
            $result = $cnx->query($sql);
            if ($reg = $result->fetchObject()){
                if ($reg->idtipousuario==1){
                    ?>
                    <li class="sub-menu">
                        <a href="premium.php" >
                            <i class="fas fa-money-bill"></i>
                            <span>Be Premium</span>
                        </a>
                    </li>
                    <?php
                }else if ($reg->idtipousuario==2){
                    ?>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fas fa-user-cog"></i>
                            <span>Administrar premium</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="mycards.php"><i class="fas fa-money-check-alt"></i>Administrar tarjetas</a></li>
                        </ul>
                        <ul class="sub">
                            <li><a  href="suscripcion.php"><i class="fas fa-book"></i>Subscripcion</a></li>
                        </ul>
                    </li>
                    <?php
                }else{
                    ?>
                    <li class="sub-menu">
                        
                    </li>
                    <?php
                }
            }
            ?>
            

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>