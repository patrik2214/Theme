<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM USUARIO WHERE idusuario=";
$result = $cnx->query($sql);

while($reg = $result->fetchObject()){

    echo utf8_encode("
        <div class='form-group'>
                <label>Name</label>
                <input type='text' class='form-control' name='txtname' id='txtname' placeholder='Enter here' value='$reg->nombre'>
         </div>
		 <div class='form-group'>
				<label>Last Name</label>
				<input type='text' class='form-control' name='txtlastname' id='txtlastname' placeholder='Enter here' value='$reg->apellido'>
		 </div>
		 <div class='form-group'>
				<label>Username</label>
				<input type='text' class='form-control' name='txtusername' id='txtusername' placeholder='Enter here' value='$reg->nombreusuario'>
		 </div>
		 <div class='form-group'>
			<label>Email</label>
			<input type='email' class='form-control' name='txtemail' id='txtemail' placeholder='Enter here' value='$reg->correo'>
            </div>
		 <div class='form-group'>
		    <label>Contraseña</label>
			<input type='password' class='form-control' name='txtpass' id='txtpass' placeholder='Enter here' value='$reg->password'>
		 </div>
         <div class='form-group'>
			<label>Confirmar Contraseña</label>
			<input type='password' class='form-control' name='txtcpass' id='txtcpass' placeholder='Enter here' value='$reg->contraseña'>
		 </div>
		 <div class='form-group'>
			<label for='uploadedfile'>Upload a Picture</label>
			<input type='file' class='form-control-file' name='img' id='img' value='$reg->foto'>
         </div>
         <div class='row'>
            <div class='col-lg-2 col-md-2 col-sm-2 mb'>
                <button  class='btn btn-success' type='submit' onclick='modify_user($reg->$idusuario)'>Save All Changes</button><br>
                <button  class='btn btn-success' type='submit' onclick='modify_user($reg->$idusuario)'>Delete Account</button><br>");
}                
?>