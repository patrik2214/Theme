<?php
require_once("conexion.php");
$sql="SELECT * FROM genero ";
$result = $cnx->query($sql);
echo "<option value=-1 > -- Selecciona un genero --  </option>";
while($reg = $result->fetchObject()){
    echo ("<option value=$reg->idgenero > $reg->descripcion  </option>");
    
}
?>