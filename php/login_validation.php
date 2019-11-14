<?php
require_once("conexion.php");
session_start();

$usuario = $_SESSION['usuario'];
$passw 	= sha1($_POST['pass']);

$sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND password='$passw'";
$rs = $cnx->query($sql) or die($sql);
$cantreg = $rs->rowCount();

if($cantreg==1) {
  $reg = $rs->fetchObject();
  $_SESSION['idusuario']=$reg->idusuario;
  $_SESSION['usuario']=$reg->usuario;
  header("location: public/vistas/home.php");
} else header("location: access.php");
 