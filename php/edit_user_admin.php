<?php
require_once("conexion.php");
$idusuario = $_POST['idusuario'];

$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
$res = $cnx->query($sql);
$reg = $res->fetchObject();
echo json_encode($reg);
?>