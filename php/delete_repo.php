<?php
require_once("conexion.php");

$resp=1;
$idrepositorio = $_POST['idrepositorio'];

try
{
    $cnx->beginTransaction();

    // DELETE DESARROLLADOR
    $c=$cnx->prepare("DELETE FROM desarrollador WHERE idrepositorio:idrepo");
    $c->bindParam(":idrepo",$idrepositorio);
    $c->execute();

    // DELETE PROYECTO 
    $b=$cnx->prepare("DELETE FROM proyecto WHERE idrepositorio:idrepo");
    $b->bindParam(":idrepo",$idrepositorio);
    $b->execute();

    // DELETE REPOSITORIO
	$a=$cnx->prepare("DELETE FROM repositorio WHERE idrepositorio:idrepo");
	$a->bindParam(":idrepo",$idrepositorio);
	$a->execute();

	$cnx->commit();
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

echo $resp;

?>