<?php
require_once("conexion.php");
$usuario = $_POST['usuario'];

$sql = "SELECT * FROM usuario WHERE usuario='$usuario' ";

$rs = $cnx->query($sql) or die($sql);
$cantreg = $rs->rowCount();
        
if($cantreg==1) {
  session_start();
  $reg = $rs->fetchObject();
  $_SESSION['usuario']=$reg->usuario;
  echo("<input type='password' id='pass' name='pass' class='form-control' placeholder='Password'>
        <label class='checkbox'>
          <span class='pull - right' > 
            < a data - toggle='modal' href = 'login.html#myModal' > Forgot Password ?</a >
          </span >
        </label>
        <button class='btn btn-theme btn-block' onclick='login()' type='submit'><i class='fa fa-lock'></i> SIGUIENTE</button>
  ");

} else header("location: login.php?mensaje=errorCredenciales");
