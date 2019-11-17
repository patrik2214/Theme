<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$sql="SELECT * FROM repositorio inner join desarrollador on repositorio.idREPOSITORIO = desarrollador.REPOSITORIO_idREPOSITORIO 
    where desarrollador.USUARIO_idUSUARIO = $user and desarrollador.TIPODESARROLLADOR_idTIPODESARROLLADOR=1 ";
$result = $cnx->query($sql);
while($reg = $result->fetchObject()){
    echo utf8_encode("<div class='showback'>
                          <h4><i class='fa fa-angle-right'></i>$reg->nombre</h4>
                          <p>$reg->descripcion</p>
                          <button type='button' class='btn btn-primary'>Configuracion</button>
                          
                        <button type='button' class='btn btn-primary'>
                            <a href='http://localhost/theme/html/myrepo.php' >Entrar</a>
                        </button>
      				</div>");
    
}

?>
