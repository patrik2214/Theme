<?php
require_once("conexion.php");
$usuario = $_POST['usuario'];

$sql = "SELECT * FROM usuario WHERE nombreUsuario='$usuario'";

$rs = $cnx->query($sql) or die($sql);
$cantreg = $rs->rowCount();
        
if($cantreg==1) {
  session_start();
  $reg = $rs->fetchObject();
  $_SESSION['usuario']=$reg->nombreUsuario;
  header("location: ../html/access.php");
}
else header("location: ../html/login.php?mensaje=errorCredenciales");
