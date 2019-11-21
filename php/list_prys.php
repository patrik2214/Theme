<?php
require_once("conexion.php");

$repo = $_POST['idrepo'];

$query="SELECT * FROM proyecto inner join genero on proyecto.GENERO_idGENERO = genero.idGENERO
where proyecto.REPOSITORIO_idREPOSITORIO = $repo";
$rs = $cnx->query($query);
while ($re = $rs->fetchObject()){   
    echo utf8_encode("    
                        <tr>
                            <td><a href='#'>$re->descripcion</a></td>
                            <td>
                                <button onclick='editar_pry($re->idPROYECTO)' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#new_rama'><i class='fa fa-pencil'></i></button>
                                <button onclick='delete_pry($re->idPROYECTO)' class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                            </td>
                        </tr>");
};
//  <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>