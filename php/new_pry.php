<?php
require_once("conexion.php");

$repo = $_POST['idrepo'];
$genero = $_POST['idgnr'];

$resp=1;
try
{
    $cnx->beginTransaction();

    $rs = $cnx->query("SELECT nombre FROM repositorio where idREPOSITORIO=$repo")  or $resp=0;
	$reg = $rs->fetchObject();
    $nomb = $reg->nombre;

    $r = $cnx->query("SELECT COALESCE(max(idPROYECTO),0)+1 as ultimo FROM proyecto")  or $resp=0;
	$re = $r->fetchObject();
    $idpry = $re->ultimo;
    // insert inside proyecto
    $b=$cnx->prepare("INSERT INTO proyecto (idPROYECTO, nombre, REPOSITORIO_idREPOSITORIO, GENERO_idGENERO) 
        VALUES(:idproy,:nombre,:repo,:gen)");
    $b->bindParam(":idproy",$idpry);
    $b->bindParam(":nombre",$nomb);
    $b->bindParam(":repo",$repo);
    $b->bindParam(":gen",$genero);
    $b->execute();
    $cnx->commit();
    
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

echo $resp;