<?php
require_once("conexion.php");

$id = $_POST['idusuario'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];

$sql="UPDATE usuario SET nombre='$name', apellido='$lastname',nombreusuario='$username', correo='$email' WHERE idusuario=$id";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;
?>