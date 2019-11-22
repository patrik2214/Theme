<?php

requiere_once("conexion.php");

$idusuario = $_POST['idusuario'];

$sql="UPDATE usuario SET estado=false WHERE idusuario='$idusuario'";
$resp=1;
$cnx->query($sql) or $resp=0;

if($resp==1){
    header("location: ../html/home.php");
}
   
?>