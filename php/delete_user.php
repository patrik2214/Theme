<?php

requiere_once("conexion.php");

$idusuario = $_POST['idusuario'];

$sql="DELETE * FROM USUARIO WHERE idusuario='$idusuarios'";
$resp=1;
$cnx->query($sql) or $resp=0;
    


?>