<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM USUARIO WHERE idusuario=$user";
$result = $cnx->query($sql);

while($reg = $result->fetchObject()){

	echo utf8_encode("
		<div class='text-center'>
			<img src='$reg->foto' class='rounded photo mx-auto d-block' alt='...'>
		</div>
        <div class='form-group'>
                <p>Name</p>
                <input type='text' class='form-control' name='txtname' id='txtname' placeholder='Enter here' value='$reg->nombre'>
         </div>
		 <div class='form-group'>
				<p>Last Name</p>
				<input type='text' class='form-control' name='txtlastname' id='txtlastname' placeholder='Enter here' value='$reg->apellido'>
		 </div>
		 <div class='form-group'>
				<p>Username</p>
				<input type='text' class='form-control' name='txtusername' id='txtusername' placeholder='Enter here' value='$reg->nombreusuario'>
		 </div>
		 <div class='form-group'>
			<p>Email</p>
			<input type='email' class='form-control' name='txtemail' id='txtemail' placeholder='Enter here' value='$reg->correo'>
		</div>
         <div class='row'>
            <div class='col-lg-2 col-md-2 col-sm-2 mb'>
				<button  class='btn btn-success' type='submit' onclick='modify_user($user)'>Save All Changes</button><br>
			</div>

			<div class='col-lg-2 col-md-2 col-sm-2 mb'>
				<button  class='btn btn-danger' type='submit' onclick='delete_user($user)'>Inactive Account</button><br>
			</div>
		</div>");
}                
?>