<?php
require_once("conexion.php");

$query="select ps.*, p.nombre,rp.idrepositorio, rp.publico, rp.colaborativo, ds.idusuario, us.nombreusuario from partituras ps 
inner join proyecto p on ps.idproyecto=p.idproyecto
inner join repositorio rp on p.idrepositorio=rp.idrepositorio
inner join desarrollador ds on rp.idrepositorio=ds.idrepositorio
inner join usuario us on ds.idusuario=us.idusuario";
$rs = $cnx->query($query);
while ($re = $rs->fetchObject()){   
    echo utf8_encode("    
                        <tr>
                            <td>$re->idpartituras</td>
                            <td>$re->url</td>
                            <td>$re->idproyecto</td>
                            <td>$re->nombre</td>
                            <td>$re->idrepositorio</td>
                            <td>$re->publico</td>
                            <td>$re->colaborativo</td>
                            <td>$re->idusuario</td>
                            <td>$re->nombreusuario</td>
                            <td>
                                <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                <button onclick='inactive_pista($re->idpistas)' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#new_rama'><i class='fa fa-pencil'></i></button>
                                <button onclick='delete_pistas($re->idpistas)' class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                            </td>
                        </tr>");
};