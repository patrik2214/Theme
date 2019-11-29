<?php
require_once("conexion.php");

$buscar = $_POST['txtbuscar'];

$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $buscar);

if (isset($consultaBusqueda)) {
    $sql="SELECT * FROM usuario WHERE nombreusuario LIKE '%$username%' ";
    $result = $cnx->query($sql) or die($sql);
    while ($reg = $result->fetchObject() ){
        echo ("<div class='showback'>
                            <div class='row'>
                                <div class = 'col-lg-3 col-md-3 col-sm-3 mb'>
                                    <p><img src='$reg->foto' class='img-circle' width='40'></p> 
                                </div>
                                <div class = 'col-lg-4 col-md-4 col-sm-4 mb'>
                                    <p>$reg->nombreusuario</p> 
                                </div>
                            </div>
                        </div>");
    
    }
};