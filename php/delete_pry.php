<?php
require_once("conexion.php");

$idpry = $_POST['idpry'];
$resp = 1;
try
{
    $cnx->beginTransaction();

	$a=$cnx->prepare("DELETE FROM pistas where PROYECTO_idPROYECTO=$idpry")  or $resp=0;
	$a->execute();
    
    $b=$cnx->prepare("DELETE FROM partituras where PROYECTO_idPROYECTO=$idpry")  or $resp=0;
    $b->execute();

	$c=$cnx->prepare("DELETE FROM proyecto where idPROYECTO=$idpry")  or $resp=0;
    $c->execute();

	$cnx->commit();
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

echo $resp;