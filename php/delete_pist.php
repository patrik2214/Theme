<?php

require_once("conexion.php");

$idpistas = $_POST['idpistas'];

$sql="DELETE FROM pistas WHERE idpistas=$idpistas";
$resp=1;
$cnx->query($sql) or $resp=0;
   
?>