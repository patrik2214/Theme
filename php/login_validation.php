<?php
require_once("conexion.php");
session_start();

$usuario = $_SESSION['usuario'];
$passw 	= sha1($_POST['pass']);
echo 1;
//Sara recuerda que aun no eh camido el campo recuerda cambiar contraseña por password
$sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND password ='$passw' ;";
$rs = $cnx->query($sql) or die($sql);
echo 1;
$cantreg = $rs->rowCount();
if($cantreg==1) {
  echo 1;
  $reg = $rs->fetchObject();
  $_SESSION['idusuario']=$reg->idUSUARIO;
  header("location: ../html/index.php");
} 
else header("location: ../html/access.php?mensaje=errorCredenciales");
 