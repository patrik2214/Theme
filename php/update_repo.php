<?php
require_once("conexion.php");

$idrepositorio = $_POST['idrepositorio'];
$name = $_POST['name'];
$public = $_POST['public'];
$des = $_POST['des'];

$sql="UPDATE repositorio SET nombre='$name', publico=$public, descripcion='$des' WHERE idrepositorio=$idrepositorio";
$resp=1;
$cnx->query($sql) or $resp=0 ;
echo $resp;