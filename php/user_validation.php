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
  header("location: access.php");
} else header("location: login.php?mensaje=errorCredenciales");
