<?php
require_once("conexion.php");
session_start();

$resp=1;

$priv = $_POST['priv'];
$nomb = $_POST['nom'];
$desc = $_POST['des'];
$genero = $_POST['gnr'];
$user =  $_SESSION['idusuario'];
$col = 0;
try
{
    $cnx->beginTransaction();

    $rs = $cnx->query("SELECT COALESCE(max(idrepositorio),0)+1 as ultimo FROM repositorio")  or $resp=0;
	$reg = $rs->fetchObject();
    $idrepo = $reg->ultimo;
    // INSERT INSIDE REPOSITORIO
	$a=$cnx->prepare("INSERT INTO repositorio (idrepositorio,fecha_creacion, nombre,publico,colaborativo,descripcion) VALUES (:idrepo,now(),:nombre,:publico,:colab,:descrip)");
	$a->bindParam(":idrepo",$idrepo);
	$a->bindParam(":nombre",$nomb);
	$a->bindParam(":publico",$priv);
	$a->bindParam(":colab",$col);
	$a->bindParam(":descrip",$desc);
	$a->execute();
    
    $r = $cnx->query("SELECT COALESCE(max(idproyecto),0)+1 as ultimo FROM proyecto")  or $resp=0;
	$re = $r->fetchObject();
    $idpry = $re->ultimo;
    // insert inside proyecto
    $b=$cnx->prepare("INSERT INTO proyecto (idproyecto, nombre, idrepositorio, idgenero) 
        VALUES(:idproy,:nombre,:repo,:gen)");
    $b->bindParam(":idproy",$idpry);
    $b->bindParam(":nombre",$nomb);
    $b->bindParam(":repo",$idrepo);
    $b->bindParam(":gen",$genero);
    $b->execute();

    $r = $cnx->query("SELECT COALESCE(max(idcolaborador),0)+1 as ultimo FROM desarrollador")  or $resp=0;
	$re = $r->fetchObject();
    $idcol = $re->ultimo;

    $uno = 1 ;
	$c=$cnx->prepare("INSERT INTO desarrollador (idcolaborador, idusuario, idrepositorio, idtipodesarrollador, estado) 
       VALUES(:idcol,:user,:repo,:tipo, :est)");
    $c->bindParam(":idcol",$idcol);
    $c->bindParam(":user",$user);
    $c->bindParam(":repo",$idrepo);
    $c->bindParam(":tipo", $uno);
    $c->bindParam(":est", $uno);
    $c->execute();

	$cnx->commit();
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

echo $resp;

?>