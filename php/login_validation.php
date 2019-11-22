<?php
require_once("conexion.php");
session_start();

$usuario = $_SESSION['usuario'];
$passw 	= sha1($_POST['pass']);
//Sara recuerda que aun no eh camido el campo recuerda cambiar contraseña por password
$sql = "SELECT * FROM usuario WHERE nombreusuario='$usuario' AND password ='$passw' ;";
$rs = $cnx->query($sql) or die($sql);

$cantreg = $rs->rowCount();
if($cantreg==1) {
  $reg = $rs->fetchObject();
  $_SESSION['idusuario']=$reg->idusuario;
  if($reg->idtipousuario==3){
    $_SESSION['usertype']=$reg->idtipousuario;
    header("location: ../html/myadmin.php");
  }else{
    $_SESSION['usertype']=$reg->idtipousuario;
    header("location: ../html/index.php");
  }
} 
else header("location: ../html/access.php?mensaje=errorCredenciales");
 