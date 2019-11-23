<?php
require_once("conexion.php");

$query="SELECT * FROM usuario where idtipousuario=1 or idtipousuario=2";
$rs = $cnx->query($query);
while ($re = $rs->fetchObject()){   
    echo utf8_encode("    
                        <tr>
                            <td>$re->idusuario</td>
                            <td>$re->nombre</td>
                            <td>$re->apellido</td>
                            <td>$re->nombreusuario</td>
                            <td>$re->correo</td>
                            <td>$re->fecha_registro</td>
                            <td>$re->idtipousuario</td>
                            <td>$re->estado</td>
                            <td>
                                <button onclick='hab_user($re->idusuario)'class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                <button onclick='edit_user_admin($re->idusuario)' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#divfrm'><i class='fa fa-pencil'></i></button>
                                <button onclick='delete_user($re->idusuario)' class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                            </td>
                        </tr>");
};
