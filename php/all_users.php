<?php
require_once("conexion.php");

$query="SELECT * FROM usuario u inner join tipousuario tp on u.idtipousuario=tp.idtipousuario
 where u.idtipousuario=1 or u.idtipousuario=2";
$rs = $cnx->query($query) or die($query);
while ($re = $rs->fetchObject()){   
    echo (" <div class='col-lg-4 col-md-4 col-sm-4 mb'>
                <!-- WHITE PANEL - TOP USER -->
                <div class='white-panel pn'>
                    <div class='white-header'>
                        <h5>$re->nombreusuario</h5>
                    </div>
                    <p><img src='$re->foto' class='img-circle' width='50'></p>
                    <p><b> $re->nombre , $re->apellido</b></p>
                        <div class='row'>
                            <div class='col-md-6'>
                                <p class='small mt'>$re->descripcion</p>
                                <p>$re->correo</p>
                                <p>$re->estado</p>
                            </div>
                            <div class='col-md-6'>
                                <button onclick='hab_user($re->idusuario)'class='btn btn-success'><i class='fa fa-check'></i></button>
                                <button onclick='edit_user_admin($re->idusuario)' class='btn btn-primary' data-toggle='modal' data-target='#divfrm'><i class='fa fa-pencil'></i></button>
                                <button onclick='delete_user($re->idusuario)' class='btn btn-danger'><i class='fa fa-trash-o '></i></button>
                                
                            </div>
                        </div>
                </div>
            </div>                     ");
                        
};
//<p class='small mt'>TOTAL SPEND</p>
//<p>$ 47,60</p>
//
//
// <tr>
//     <td>$re->idusuario</td>
//     <td></td>
//     <td></td>
//     <td></td>
//     <td></td>
//     <td>$re->fecha_registro</td>
//     <td>$re->idtipousuario</td>
//     <td>$re->estado</td>
//     <td>
//         <button onclick='hab_user($re->idusuario)'class='btn btn-success'><i class='fa fa-check'></i></button>
//         <button onclick='edit_user_admin($re->idusuario)' class='btn btn-primary' data-toggle='modal' data-target='#divfrm'><i class='fa fa-pencil'></i></button>
//         <button onclick='delete_user($re->idusuario)' class='btn btn-danger'><i class='fa fa-trash-o '></i></button>
//     </td>
// </tr>

//  <div class='card text-center'>
//     <div class='card-header'>
//         $re->descripcion
//     </div>
//     <div class='card-body'>
//         <h5 class='card-title'>$re->nombreusuario</h5>
//         <p class='card-text'>Nombre: $re->apellido , $re->nombre </p>
//         <p class='card-text'>Correo: $re->correo</p>
//         <p class='card-text'>Correo: $re->estado</p>
//         <button onclick='hab_user($re->idusuario)'class='btn btn-success'><i class='fa fa-check'></i></button>
//         <button onclick='edit_user_admin($re->idusuario)' class='btn btn-primary' data-toggle='modal' data-target='#divfrm'><i class='fa fa-pencil'></i></button>
//         <button onclick='delete_user($re->idusuario)' class='btn btn-danger'><i class='fa fa-trash-o '></i></button>
//     </div>
//     <div class='card-footer text-muted'>
//         2 days ago
//     </div>
// </div>  