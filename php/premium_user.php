<?php
require_once("conexion.php");
require ('../vendor/autoload.php');
$resp=1;

session_start();
$user =  $_SESSION['idusuario'];

$SECRET_KEY = "sk_test_x8Iv6w19yqoFn4J3";
try {
    $sql ="SELECT culqi_customerid FROM usuario where idusuario=$user";
    $rs = $cnx->query($sql)  or die($sql);
    $reg = $rs->fetchObject();
    $customer_id = $reg->culqi_customerid;

    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
    
    $card = $culqi->Cards->create(
        array(
            "customer_id" => $customer_id,
            "token_id" => $_POST['token']
        )
    );

    $sub = $culqi->Subscriptions->create(
    array(
        "card_id" => $card->id,
        "plan_id" => "pln_test_gkn2wBuKhBgHRyhb"
    )
    );
    
    $sql="UPDATE usuario set idsuscripcion=$sub->id WHERE idusuario=$user";
    $rs = $cnx->query($sql) or $resp=0;

    $sql="UPDATE usuario set idtipousuario=2 WHERE idusuario=$user";
    $rs = $cnx->query($sql) or $resp=0;
    echo $resp;
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
