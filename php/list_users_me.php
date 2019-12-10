<?php
require_once("conexion.php");

$query="SELECT * FROM usuario u INNER JOIN tipousuario tp ON u.idtipousuario=tp.idtipousuario
 where u.idtipousuario=1 or u.idtipousuario=2";
$rs = $cnx->query($query) or die($query);
while ($re = $rs->fetchObject()){   
    if($re->foto == null){
        echo ("<div class='col-lg-4 col-md-4 col-sm-4 mb'>
        <!-- WHITE PANEL - TOP USER -->
        <div class='white-panel pn'>
            <div class='white-header'>
                <h5>$re->nombreusuario</h5>
            </div>
            <p><img src='../assets/img/music.png' class='img-circle' width='50'></p>
            <p><b> $re->nombre , $re->apellido</b></p>
                <div class='row'>
                    <div class='col-md-6'>
                        <p class='small mt'>$re->descripcion</p>
                        <p>$re->correo</p>
                    </div>
                    <div class='col-md-6'>
                        <a href='http://localhost:90/theme/html/index2.php?us=$re->nombreusuario' >Ver</a>
                    </div>
                </div>
        </div>
    </div>");
    }else{
        echo ("<div class='col-lg-4 col-md-4 col-sm-4 mb'>
        <!-- WHITE PANEL - TOP USER -->
        <div class='white-panel pn'>
            <div class='white-header'>
                <h5>$re->nombreusuario</h5>
            </div>
            <p><img src='$re->foto' class='img-circle' width='50'></p>
            <p><b> $re->nombre , $re->apellido</b></p>
                <div class='row'>
                    <div class='col-md-6'>
                        <p class='small mt'>$re->descripcion</p>
                        <p>$re->correo</p>
                    </div>
                    <div class='col-md-6'>
                        <a href='http://localhost:90/theme/html/index2.php?us=$re->nombreusuario' >Ver</a>
                    </div>
                </div>
        </div>
    </div>");
    }



                        
};