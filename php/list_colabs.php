<?php
require_once("conexion.php");

$repo = $_POST['idrepo'];

$query="SELECT * FROM desarrollador  inner join usuario on desarrollador.idusuario=usuario.idusuario
where desarrollador.idrepositorio= $repo";
$rs = $cnx->query($query);
while($re = $rs->fetchObject()){
    $tipodev = 'Invitado';
    if ($re->idtipodesarrollador==1){
        $tipodev = 'Propietario';
    }
    echo utf8_encode("     
         <tr>
            <td><a href='myporfile?user=$re->idusuario'>$re->nombre</a></td>
            <td>$tipodev</td>
            <td>
                <button onclick='delete_colab($re->idusuario,$repo)' class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
            </td>
        </tr>
    ");
}

?>