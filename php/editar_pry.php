<?php
require_once("conexion.php");
$id = $_POST['idpry'];

$sql="SELECT * FROM proyecto WHERE idPROYECTO=$id";
$res = $cnx->query($sql);
$reg = $res->fetchObject();

echo json_encode($reg);

?>