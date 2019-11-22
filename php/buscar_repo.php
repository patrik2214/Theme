<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$buscar = $_POST['txtbuscar'];

$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $buscar);

if (isset($consultaBusqueda)) {
    $sql="SELECT * FROM repositorio inner join desarrollador on repositorio.idREPOSITORIO = desarrollador.idREPOSITORIO 
    WHERE repositorio.nombre LIKE '%$consultaBusqueda%' and desarrollador.idUSUARIO = $user and desarrollador.idTIPODESARROLLADOR=1 ";
    $result = $cnx->query($sql) or die($sql);
    while ($reg = $result->fetchObject() ){
        echo ("<div class='showback'>
                            <h4><i class='fa fa-angle-right'></i>$reg->nombre</h4>
                            <p>$reg->descripcion</p>                          
                            <button type='button' class='btn btn-default'>
                                <a href='http://localhost/theme/html/myrepo.php?repo=$reg->idREPOSITORIO' >Entrar</a>
                            </button>
                        </div>");
    
    }
};