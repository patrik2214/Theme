<?php
require_once("conexion.php");

$idpistas = $_POST['idpistas'];
$idusuario = $_POST['idusuario'];
$username = $_POST['username'];
$url = $_POST['url'];
$codp = $_POST['codp'];
$name = $_POST['name'];
$coder = $_POST['coder'];
$public = $_POST['public'];
$col = $_POST['col'];

$sql="UPDATE pistas SET url='$url' nombre='$name', publico=$public,colaborativo=$col WHERE idpistas=$idpistas;
$resp=1;
$cnx->query($sql) or die($sql);
echo $resp;
?>



