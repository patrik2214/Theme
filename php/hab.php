<?php
require_once("conexion.php");

$idusuario = $_POST['idusuario'];

$sql="UPDATE usuario SET estado=true WHERE idusuario=$idusuario";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;
   
?>