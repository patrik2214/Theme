<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM USUARIO WHERE idusuario=$user";
$result = $cnx->query($sql);

while($reg = $result->fetchObject()){

    if($reg->foto == null){

        echo utf8_encode("
        <div class='row'>
            <div class='row-lg-6 row-md-6 row-sm-6 mb'>
                <p class='centered'><img src='../assets/img/music.png' class='img-circle' width='300' heigth='140'></p>
            </div>
            <div class='row-lg-6 row-md-6 row-sm-6 mb'>
                <h3><p class='centered'>$reg->nombreusuario</p></h3>
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-1 col-md-1 col-sm-1 mb'></div>

            <div class='col-lg-6 col-md-6 col-sm-6 mb'>
                <div class='form-group'>
                    <h3>Name : $reg->nombre</h3>      
                </div>
                <div class='form-group'>
                    <h3>Last Name: $reg->apellido</h3>
                </div>
                <div class='form-group'>
                    <h3>Email: $reg->correo</h3>
                </div> 
                <div class='form-group'>
                    <button  class='btn btn-success' type='submit' ><a href='settings_user.php'>Edit</a></button><br>
                </div>
            </div>
        </div>

        ");
    }else{
        echo utf8_encode("
        <div class='row'>
            <div class='row-lg-6 row-md-6 row-sm-6 mb'>
                <p class='centered'><img src='$reg->foto' class='img-circle' width='300' heigth='140'></p>
            </div>
            <div class='row-lg-6 row-md-6 row-sm-6 mb'>
                <h3><p class='centered'>$reg->nombreusuario</p></h3>
            </div>
        </div>
        <div class='row'>
            <div class='row-lg-2 row-md-2 row-sm-2 mb'></div>

            <div class='row-lg-2 row-md-2 row-sm-2 mb'>
                <div class='form-group'>
                    <h3>Name : $reg->nombre</h3>      
                </div>
                <div class='form-group'>
                    <h3>Last Name: $reg->apellido</h3>
                </div>
                <div class='form-group'>
                    <h3>Email: $reg->correo</h3>
                </div> 
                <div class='form-group'>
                    <p  class='btn btn-success' type='submit' href='settings_user.php'>Edit</p><br>
                </div>
            </div>
        </div>

        ");
    }

    
}                
?>