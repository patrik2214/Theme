<?php
require_once("conexion.php");
$username = $_POST['username'];

$sql="SELECT * FROM USUARIO WHERE nombreusuario LIKE '%$username%' ";
$result = $cnx->query($sql) or die($sql);
while($reg = $result->fetchObject()){
    echo "<tr>
			<td>$reg->nombreusuario</td>
			<td>$reg->nombre , $reg->apellido</td>
			<td>
				<button type='button' class='btn btn-info' onclick='search($reg->idusuario)'>Agregar</button>
			</td>
		</tr>";
}
?>
<!-- <tr>
	<td>1</td>
	<td>Mark</td>
	<td>Otto</td>
	<td>@mdo</td>
</tr>
<td><img src='$reg->foto' class='img-circle' width='50'></td> -->