<?php
require_once("conexion.php");

$idrespositorio = $_POST['idrespositorio'];
$name = $_POST['name'];
$date= $_POST['date'];
$public = $_POST['public'];
$cola = $_POST['cola'];
$des = $_POST['des'];

$sql="UPDATE respositorio SET nombre='$name', fecha_creacion='$date',public='$public', descripcion='$des',colaborativo='$cola' WHERE idrespositorio=$idrespositorio";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;
?>