<?php
require_once("conexion.php");

$id = $_POST['idusuario'];
$name = $_POST['txtname'];
$lastname = $_POST['txtlastname'];
$username = $_POST['txtusername'];
$email = $_POST['txtemail'];

$sql="UPDATE usuario SET nombre='$name', apellido='$lastname',nombreusuario='$username', email='$email' WHERE idusuario='$id'";
$resp=1;
$cnx->query($sql) or $resp=0;
echo $resp;
?>