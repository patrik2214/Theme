<?php
require_once("conexion.php");

$gnr = $_POST['idgnr'];
$pry = $_POST['idpry'];
$name = $_POST['name'];
$bpm = $_POST['bpm'];
$format = $_POST['format'];

$sql="UPDATE proyecto SET idgenero=$gnr, nombre='$name', bpm='$bpm', formato='$format'  WHERE idproyecto=$pry";
$resp=1;
$cnx->query($sql) or die($sql);
echo $resp;