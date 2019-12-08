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
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
            "email" => $_POST['email'],
            "address" => $_POST['address'],
            "address_city" => $_POST['address_city'],
            "country_code" => "PE",
            "phone_number" => $_POST['phone_number']
        )
    );
    
    $card = $culqi->Cards->create(
        array(
            "customer_id" => $customer->id,
            "token_id" => $_POST['token']
        )
    );

    $culqi->Subscriptions->create(
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
