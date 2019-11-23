<?php
require_once("conexion.php");
$idpistas = $_POST['idpistas'];

$sql="SELECT * FROM pistas WHERE idpistas=$idpistas";
$res = $cnx->query($sql);
$reg = $res->fetchObject();
echo json_encode($reg);
?>