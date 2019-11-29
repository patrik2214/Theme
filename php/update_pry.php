<?php
require_once("conexion.php");

$gnr = $_POST['idgnr'];
$pry = $_POST['idpry'];
$name = $_POST['name'];

$sql="UPDATE proyecto SET idgenero=$gnr, nombre='$name'  WHERE idproyecto=$pry";
$resp=1;
$cnx->query($sql) or die($sql);
echo $resp;