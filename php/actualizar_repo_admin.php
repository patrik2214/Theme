<?php
require_once("conexion.php");

$idrepositorio = $_POST['idrepositorio'];
$name = $_POST['name'];
$date= $_POST['date'];
$public = $_POST['public'];
$cola = $_POST['cola'];
$des = $_POST['des'];

$sql="UPDATE repositorio SET nombre='$name', fecha_creacion='$date', publico=$public, descripcion='$des',colaborativo=$cola WHERE idrepositorio=$idrepositorio";
$resp=1;
$cnx->query($sql) or die($sql);
echo $resp;
?>