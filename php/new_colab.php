<?php
require_once("conexion.php");

$colab = $_POST['idcolab'];
$repo = $_POST['idrepositorio'];
$tipo = 2;
$esta = true;
$resp=1;
try{
    $cnx->beginTransaction();

    $r = $cnx->query("SELECT COALESCE(max(idcolaborador),0)+1 as ultimo FROM desarrollador")  or $resp=0;
	$re = $r->fetchObject();
    $idpry = $re->ultimo;

    // insert inside proyecto
    $b=$cnx->prepare("INSERT INTO desarrollador (idcolaborador, idusuario, idrepositorio, idtipodesarrollador,estado) 
        VALUES( :colaborador, :usuario, :repositorio, :tipodesarrollador, :est)");
    $b->bindParam(":colaborador",       $idpry);
    $b->bindParam(":usuario",           $colab);
    $b->bindParam(":repositorio",       $repo);
    $b->bindParam(":tipodesarrollador", $tipo);
    $b->bindParam(":est",               $esta);
    
    $b->execute();
    $cnx->commit();
    
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

echo $resp;