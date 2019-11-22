<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$resp=1;

$sql="UPDATE usuario WHERE idusuario='$user'";
$rs = $cnx->query($sql) or $resp=0;

  
//tenemos que ver lo de el pago para poder reenviar al usuario y que ingrese su tarjeta 
if($resp==1) {
  echo"NOW you are Premium";
}else{
    echo"OPS :( ";
}