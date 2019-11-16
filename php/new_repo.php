<?php

try
{
    $cnx->beginTransaction();

	$a=$cnx->prepare("INSERT INTO pedido (idcliente,fechahora) VALUES (:idusuario,now())");
	$a->bindParam(":idusuario",$idusuario);
	$a->execute();

	$rs = $cnx->query("SELECT max(idpedido) as ultimo FROM pedido")  or $resp=0;
	$reg = $rs->fetchObject();
	$idpedido = $reg->ultimo;

	$total=0;

	
	foreach ($ped as $i){
		$b=$cnx->prepare("INSERT INTO detalle (idpedido, idproducto, cantidad, precio, importe)	VALUES(:idpedido,:idproducto,:cantidad,:precio,:importe)");
		$total += $i[4];
		$b->bindParam(":idpedido",$idpedid);
		$b->bindParam(":idproducto",$i[1]);
		$b->bindParam(":cantidad",$i[2]);
		$b->bindParam(":precio",$i[3]);
		$b->bindParam(":importe", $i[4]);
		$b->execute();
	}

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