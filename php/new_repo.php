<?php
$priv = $_POST['priv'];
$nomb = $_POST['nom'];
$desc = $_POST['des'];
$genero = $_POST['gnr'];
$col = 0;
try
{
    $cnx->beginTransaction();

    $rs = $cnx->query("SELECT COALESCE(max(idREPOSITORIO),0)+1 as ultimo FROM repositorio")  or $resp=0;
	$reg = $rs->fetchObject();
    $idrepo = $reg->ultimo;
    // INSERT INSIDE REPOSITORIO
	$a=$cnx->prepare("INSERT INTO repositorio (idREPOSITORIO,fecha_creacion, nombre,publico,colaborativo) VALUES (:idrepo,now(),:nombre,:publico,:colab)");
	$a->bindParam(":idusuario",$idrepo);
	$a->bindParam(":nombre",$nomb);
	$a->bindParam(":publico",$priv);
	$a->bindParam(":colab",$col);
	$a->execute();
    
    $r = $cnx->query("SELECT COALESCE(max(idPROYECTO),0)+1 as ultimo FROM proyecto")  or $resp=0;
	$re = $r->fetchObject();
    $idpry = $re->ultimo;
    // insert inside proyecto
    $b=$cnx->prepare("INSERT INTO proyecto (idPROYECTO, nombre, REPOSITORIO_idREPOSITORIO, GENERO_idGENERO) 
    VALUES(:idproy,:nombre,:repo,:gen)");
    $b->bindParam(":idproy",$idpry);
    $b->bindParam(":nombre",$nomb);
    $b->bindParam(":repo",$idrepo);
    $b->bindParam(":gen",$genero);
    $b->execute();

	//Actualizar el total
	$c=$cnx->prepare("UPDATE pedido SET total=:total WHERE idpedido=:idpedido");
	$c->bindParam(":total",$total);
	$c->bindParam(":idpedido",$idpedido);
	$c->execute();

	$cnx->commit();
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

echo $resp;

?>