<?php
require_once("conexion.php");
$sql="SELECT * FROM genero ";
$result = $cnx->query($sql);
echo "<option value=-1 > -- Selecciona un genero --  </option>";
while($reg = $result->fetchObject()){
    echo utf8_encode("<option value=$reg->idGENERO > $reg->descripcion  </option>");
    
}
?>