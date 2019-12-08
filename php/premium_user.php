<?php
require_once("conexion.php");
require ('../vendor/autoload.php');
$resp=1;

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM usuario WHERE idusuario = $user";
$rs = $cnx->query($sql) or die($sql);
$reg = $rs->fetchObject();

$SECRET_KEY = "sk_test_x8Iv6w19yqoFn4J3";
try {
    
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
    $customer = $culqi->Customers->create(
        array(
            "first_name" => $reg->nombre,
            "last_name" => $reg->apellido,
            "email" => $_POST['email'],
            "address" => "San Francisco Bay Area",
            "address_city" => "Lima",
            "country_code" => "PE",
            "phone_number" => "321698569"
        )
    );
    echo $customer;
    $card = $culqi->Cards->create(
        array(
            "customer_id" => $customer->id,
            "token_id" => $_POST['token']
        )
    );

    $sub = $culqi->Subscriptions->create(
    array(
        "card_id" => $card->id,
        "plan_id" => "pln_test_gkn2wBuKhBgHRyhb"
    )
    );

    $sql="UPDATE usuario set idtipousuario=2 WHERE idusuario=$user";
    $rs = $cnx->query($sql) or $resp=0;
    echo $resp;
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
