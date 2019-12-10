<?php
require_once("conexion.php");

$user = $_POST['user'];

    $sql="SELECT * FROM repositorio r inner join desarrollador d on r.idrepositorio = d.idrepositorio
        where d.idusuario=(SELECT idusuario FROM usuario WHERE nombreusuario='$user') and d.idtipodesarrollador=1 or d.idtipodesarrollador=2";
    $result = $cnx->query($sql);
    while($reg = $result->fetchObject()){
        echo ("<div class='showback'>
                            <h4><i class='fas fa-record-vinyl'></i>$reg->nombre</h4>
                            <p>$reg->descripcion</p>                          
                            <button type='button' class='btn btn-default'>
                                <a href='http://localhost:90/theme/html/myrepo.php?repo=$reg->idrepositorio'>Entrar</a>
                            </button>
                          </div>");
        
    }

?>
