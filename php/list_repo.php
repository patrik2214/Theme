<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];
$tipo_user = $_SESSION['usertype'];

if ($tipo_user == 3){
    $sql="SELECT * FROM repositorio ";
    $result = $cnx->query($sql);
    while($reg = $result->fetchObject()){
        echo ("<tr>
                            <td>$reg->idrepositorio</td>
                            <td>$reg->nombre</td>
                            <td>$reg->fecha_creacion</td>
                            <td>$reg->publico</td>
                            <td>$reg->colaborativo</td>
                            <td>$reg->descripcion</td>
                            <td>
                                <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                <button onclick='update_repo_admin($reg->idrepositorio)' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#divfrm'><i class='fa fa-pencil'></i></button>
                                <button onclick='delete_repositorio($reg->idrepositorio)' class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                            </td>
                        </tr>");
        
    }
}else{
    $sql="SELECT * FROM repositorio r inner join desarrollador d on r.idrepositorio = d.idrepositorio
        where d.idusuario = $user and d.idtipodesarrollador=1 ";
    $result = $cnx->query($sql);
    while($reg = $result->fetchObject()){
        echo ("<div class='showback'>
                            <h4><i class='fa fa-angle-right'></i>$reg->nombre</h4>
                            <p>$reg->descripcion</p>                          
                            <button type='button' class='btn btn-default'>
                                <a href='http://localhost/theme/html/myrepo.php?repo=$reg->idrepositorio' >Entrar</a>
                            </button>
                          </div>");
        
    }
}

?>
