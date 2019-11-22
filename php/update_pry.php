<?php
require_once("conexion.php");

$gnr = $_POST['idgnr'];
$pry = $_POST['idpry'];

$sql="UPDATE proyecto SET proyecto.idgenero = $gnr  WHERE idproyecto=$pry";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;