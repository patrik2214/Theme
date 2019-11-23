<?php
require_once("conexion.php");

$resp=1;
$idrepositorio = $_POST['idrepositorio'];

try
{
    $cnx->beginTransaction();

    // DELETE PISTAS
    $n=$cnx->prepare("DELETE FROM pistas WHERE idproyecto = (SELECT idproyecto FROM proyecto WHERE idrepositorio=:idrepo)");
    $n->bindParam(":idrepo",$idrepositorio);
    $n->execute();

    // DELETE PARTITURAS
    $m=$cnx->prepare("DELETE FROM partitura WHERE idproyecto = (SELECT idproyecto FROM proyecto WHERE idrepositorio=:idrepo)");
    $m->bindParam(":idrepo",$idrepositorio);
    $m->execute();

    // DELETE DESARROLLADOR
    $c=$cnx->prepare("DELETE FROM desarrollador WHERE idrepositorio=:idrepo");
    $c->bindParam(":idrepo",$idrepositorio);
    $c->execute();

    // DELETE PROYECTO 
    $b=$cnx->prepare("DELETE FROM proyecto WHERE idrepositorio=:idrepo");
    $b->bindParam(":idrepo",$idrepositorio);
    $b->execute();

    // DELETE REPOSITORIO
	$a=$cnx->prepare("DELETE FROM repositorio WHERE idrepositorio=:idrepo");
	$a->bindParam(":idrepo",$idrepositorio);
	$a->execute();

	$cnx->commit();
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

echo $resp;

?>