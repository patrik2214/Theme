<?php
require_once("conexion.php");
$buscar = $_POST['buscar'];

$sql="SELECT * FROM USUARIO WHERE nombreusuario LIKE '%$buscar%' ";
$result = $cnx->query($sql) or die($sql);
while($re = $result->fetchObject()){
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
                    <a href='http://localhost:90/theme/html/index2.php?us=$re->nombreusuario'>Ver</a>
                        
                    </div>
                </div>
        </div>
    </div>");
    }

}


?>