<?php
require_once("conexion.php");

$repo = $_POST['idrepo'];
$genero = $_POST['idgnr'];

$resp=1;
try{
    $cnx->beginTransaction();

    $rs = $cnx->query("SELECT nombre FROM repositorio where idrepositorio=$repo")  or $resp=0;
	$reg = $rs->fetchObject();
    $nomb = $reg->nombre;

    $r = $cnx->query("SELECT COALESCE(max(idproyecto),0)+1 as ultimo FROM proyecto")  or $resp=0;
	$re = $r->fetchObject();
    $idpry = $re->ultimo;
    
    if(isset($_POST['name'])){
        $nomb = $_POST['name'];
    } 
    // insert inside proyecto
    $b=$cnx->prepare("INSERT INTO proyecto (idproyecto, nombre, idrepositorio, idgenero) 
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