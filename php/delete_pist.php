<?php

require_once("conexion.php");

$idpistas = $_POST['idpistas'];

$sql ="SELECT url FROM pistas WHERE idpistas=$idpistas";
$rs = $cnx->query($sql)  or die($sql);
$reg = $rs->fetchObject();
$link = $reg->url;
$directorio = "../music/$link";
unlink($directorio);

$sql="DELETE FROM pistas WHERE idpistas=$idpistas";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;
?>