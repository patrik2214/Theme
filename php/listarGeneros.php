<?php
require_once("../conexion.php");
$sql="SELECT * FROM genero ";
$result = $cnx->query($sql);
while($reg = $result->fetchObject()){
    echo "<option value=$reg->idcategoria > $reg->descripcion  </option>";
    
}
?>