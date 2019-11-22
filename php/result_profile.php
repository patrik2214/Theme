<?php
require_once("conexion.php");

$user =  $_POST['username'];

$sql="SELECT * FROM USUARIO WHERE nombreusuario=$user";
$result = $cnx->query($sql);

while($reg = $result->fetchObject()){

    echo utf8_encode("
        <div class='row'>
            <div class='col-lg-8 col-md-8 col-sm-8 mb'>
                <p class='centered'><a href='index.php'><img src='$reg->foto' class='img-circle' width='140' heigth='140'></a></p>
            </div>
            <div class='col-lg-8 col-md-8 col-sm-8 mb'>
            <label class='centered'>Name : $user</label>
            </div>
        </div>
        <div class='form-group'>
            <label>Name : $reg->nombre</label>      
         </div>
		 <div class='form-group'>
			<label>Last Name: $reg->apellido</label>
		 </div>
		 <div class='form-group'>
		    <label>Username: $reg->nombreUsuario</label>
		 </div>
		 <div class='form-group'>
			<label>Email: $reg->correo</label>
        </div> 
        <div class='form-group'>
        <button  class='btn btn-success' type='submit' href='setting_user.php'>Edit</button><br>
        </div>");
}                
?>