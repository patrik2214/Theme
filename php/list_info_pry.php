<?php
require_once("conexion.php");

$pry = $_POST['idpry'];

$query="SELECT * FROM proyecto inner join genero on proyecto.idgenero = genero.idgenero
where proyecto.idproyecto = $pry";
$rs = $cnx->query($query);
while ($re = $rs->fetchObject()){   
    echo ("  
            <h1>$re->nombre</h1>
            <span><i class='far fa-file-audio'></i> $re->bpm</span>
            <span><i class='far fa-file-audio'></i> $re->formato</span>
            <span><i class='far fa-file-audio'></i> $re->descripcion</span> ");
};