<?php
require_once("conexion.php");
$username = $_POST['username'];

$sql="SELECT * FROM USUARIO WHERE nombreusuario LIKE ''%$username%''";
$result = $cnx->query($sql);
while($reg = $result->fetchObject()){
    echo "<tr>
			<td><img src='$reg->foto' class='img-circle' width='50'></td>
			<td>$username</td>
			<td>
				<button type='button' class='btn btn-info' onclick='search($username)'>View</button>
			</td>
		</tr>";
}
?>