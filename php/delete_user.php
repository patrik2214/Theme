<?php

require_once("conexion.php");

$iduser = $_POST['iduser'];
$repo = $_POST['repo'];

$sql="UPDATE usuario SET estado=false WHERE idusuario=$idusuario";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;
   
?>