<?php
require_once("conexion.php");
require ('../vendor/autoload.php');
$resp=1;

session_start();
$user =  $_SESSION['idusuario'];
$SECRET_KEY = "sk_test_x8Iv6w19yqoFn4J3";
try {
    $sql ="SELECT idsuscripcion FROM usuario where idusuario=$user";
    $rs = $cnx->query($sql)  or die($sql);
    $reg = $rs->fetchObject();
    $suscripcion = $reg->idsuscripcion;
    
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

    $culqi->Subscriptions->delete($suscripcion);

    $sql="UPDATE usuario set idtipousuario=1 WHERE idusuario=$user";
    $rs = $cnx->query($sql) or die($sql);
    echo $resp;
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
?>