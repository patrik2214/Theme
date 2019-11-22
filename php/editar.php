<?php
require_once("conexion.php");
$id = $_POST['id'];

$sql="SELECT * FROM repositorio WHERE idrepositorio=$id";
$res = $cnx->query($sql);
$reg = $res->fetchObject();

echo json_encode($reg);

?>