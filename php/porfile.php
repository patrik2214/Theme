<?php

require_once("conexion.php");

$username = $_POST['username'];

$sql="SELECT repositorio.* FROM repositorio INNER JOIN desarrollador ON desarrollador.idrepositorio=repositorio.idrepositorio WHERE idusuario=(SELECT idusuario FROM usuario WHERE nombreusuario='$username')";
$result = $cnx->query($sql);
while($reg = $result->fetchObject()){
    echo (" <tr>
                <td>$reg->nombre</td>
                <td>$reg->fecha_creacion</td>
                <td>$reg->descripcion</td>
                <td>$reg->publico</td>
                <td>$reg->colaborativo</td>
            </tr>");
    
}
?>