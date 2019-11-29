<?php
require_once("conexion.php");

$repo = $_POST['idrepo'];

$query="SELECT * FROM proyecto inner join genero on proyecto.idgenero = genero.idgenero
where proyecto.idrepositorio = $repo";
$rs = $cnx->query($query);
while ($re = $rs->fetchObject()){   
    echo ("    
            <tr>
                <td><a href='http://localhost/theme/html/myproyect.php?pry=$re->idproyecto'>$re->nombre</a></td>
                <td>$re->descripcion</td>
                <td>$re->bpm</td>
                <td>
                    <button onclick='editar_pry($re->idproyecto)' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#new_rama'><i class='fa fa-pencil'></i></button>
                    <button onclick='delete_pry($re->idproyecto)' class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                </td>
            </tr>");
};
//  <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>