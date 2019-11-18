<?php

requiere_once("conexion.php");

$idusuario = $_POST['idusuario'];

$sql="DELETE * FROM USUARIO WHERE idusuario='$idusuario'";
$resp=1;
$cnx->query($sql) or $resp=0;
    
?>