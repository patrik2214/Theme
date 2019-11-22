<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM USUARIO WHERE idusuario=$user";
$result = $cnx->query($sql);

while($reg = $result->fetchObject()){

    echo utf8_encode("
        <div class='row'>
            <div class='row-lg-6 row-md-6 row-sm-6 mb'>
                <p class='centered'><img src='$reg->foto' class='img-circle' width='140' heigth='140'></p>
            </div>
            <div class='row-lg-6 row-md-6 row-sm-6 mb'>
                <p class='centered'>$reg->nombreusuario</p>
            </div>
        </div>
        <div class='row'>
            <div class='form-group'>
                <h2>Name : $reg->nombre</h2>      
            </div>
		    <div class='form-group'>
			<h2>Last Name: $reg->apellido</h2>
		 </div>
		 <div class='form-group'>
			<h2>Email: $reg->correo</h2>
        </div> 
        <div class='form-group'>
        <button  class='btn btn-success' type='submit' href='setting_user.php'>Edit</button><br>
        </div>
        </div>

        ");
}                
?>