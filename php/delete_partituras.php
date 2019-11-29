<?php

require_once("conexion.php");

$idpartituras = $_POST['idpartituras'];

$sql="DELETE FROM partituras WHERE idpartituras=$idpartituras";
$resp=1;
$cnx->query($sql) or $resp=0;
   
?>