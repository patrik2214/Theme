<?php
require_once("conexion.php");
require ('../vendor/autoload.php');
$resp=1;

session_start();
$user =  $_SESSION['idusuario'];

$SECRET_KEY = "sk_test_x8Iv6w19yqoFn4J3";
try {
    
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
    $customer = $culqi->Customers->create(
        array(
            "first_name" => "Richard",
            "last_name" => "Hendricks",
            "email" => "richard@piedpiper.com",
            "address" => "San Francisco Bay Area",
            "address_city" => "Palo Alto",
            "country_code" => "US",
            "phone_number" => "6505434800"
        )
    );

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

    $sql="UPDATE usuario WHERE idusuario=$user";
    $resp = json_encode($sub);
    $rs = $cnx->query($sql) or $resp=0;
    echo $resp;
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
