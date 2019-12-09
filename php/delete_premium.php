<?php
require_once("conexion.php");
require ('../vendor/autoload.php');
$resp=1;

session_start();
$user =  $_SESSION['idusuario'];

try {
    $culqi->Subscriptions->delete("id");

    $sql="UPDATE usuario set idtipousuario=1 WHERE idusuario=$user";
    $rs = $cnx->query($sql) or die($sql);
    echo $resp;
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
?>