<?php
require_once("conexion.php");

$repo = $_POST['idrepo'];

$query="SELECT * FROM desarrollador  inner join usuario on desarrollador.USUARIO_idUSUARIO=usuario.idUSUARIO
where desarrollador.REPOSITORIO_idREPOSITORIO = $repo";
$rs = $cnx->query($query);
while($re = $rs->fetchObject()){
    $tipodev = 'Invitado';
    if ($re->TIPODESARROLLADOR_idTIPODESARROLLADOR==1){
        $tipodev = 'Propietario';
    }
    echo utf8_encode("     
         <tr>
            <td><a href='#'>$re->nombre</a></td>
            <td>$tipodev</td>
            <td>
                <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
                <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
            </td>
        </tr>
    ");
}

?>