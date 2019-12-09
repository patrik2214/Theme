<?php

require_once("conexion.php");

$idusuario = $_POST['idusuario'];
$pass =$_POST['pass'];
$con = $_POST['con'];

if($pass=$con){
    $sql="UPDATE usuario SET password='$pass' WHERE idusuario=$idusuario";
    $resp=1;
    $cnx->query($sql) or $resp=0;
}
echo $resp;

   
?>