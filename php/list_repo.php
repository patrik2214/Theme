<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM repositorio r inner join desarrollador d on r.idREPOSITORIO = d.idREPOSITORIO 
    where d.idUSUARIO = $user and d.idTIPODESARROLLADOR=1 ";
$result = $cnx->query($sql);
while($reg = $result->fetchObject()){
    echo ("<div class='showback'>
                        <h4><i class='fa fa-angle-right'></i>$reg->nombre</h4>
                        <p>$reg->descripcion</p>                          
                        <button type='button' class='btn btn-default'>
                            <a href='http://localhost/theme/html/myrepo.php?repo=$reg->idREPOSITORIO' >Entrar</a>
                        </button>
      				</div>");
    
}

?>
