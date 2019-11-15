<?php
require_once("conexion.php");
session_start();

$usuario = $_SESSION['usuario'];
$passw 	= sha1($_POST['pass']);

$sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND contraseña='$passw' ";
$rs = $cnx->query($sql) or die($sql);
$cantreg = $rs->rowCount();

if($cantreg==1) {
  $reg = $rs->fetchObject();
  $_SESSION['idusuario']=$reg->idUSUARIO;
  header("location: ../html/index.php");
} 
else header("location: ../html/access.php?mensaje=errorCredenciales");
 