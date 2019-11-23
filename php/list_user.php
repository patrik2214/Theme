<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM USUARIO WHERE idusuario=$user";
$res = $cnx->query($sql);
$reg = $res->fetchObject();

echo json_encode($reg);
  
?>