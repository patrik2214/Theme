<?php

require_once("conexion.php");

$idusuario = $_POST['idusuario'];

$sql="ELETE FROM desarrollador WHERE idusuario=$iduser and idrepositorio=$repo and idtipodesarrollador<>1 and estado=true";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;
   
?>