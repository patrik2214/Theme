<?php
require_once("conexion.php");
$idrespositorio = $_POST['idrepositorio'];

$sql="SELECT * FROM repositorio WHERE idrepositorio='$idrespositorio'";
$res = $cnx->query($sql);
$reg = $res->fetchObject();
echo json_encode($reg);
?>