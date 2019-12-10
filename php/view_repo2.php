<?php
require_once("conexion.php");

$repo = $_POST['idrepo'];

$sql="SELECT repositorio.* , desarrollador.*, usuario.nombre as usser FROM repositorio 
    inner join desarrollador on repositorio.idREPOSITORIO = desarrollador.idrepositorio
    inner join usuario on desarrollador.idusuario=usuario.idusuario
    where repositorio.idrepositorio = $repo";
$result = $cnx->query($sql);

if ($reg = $result->fetchObject()){
    $pub = 'Privado';
    if ($reg->publico==1){
        $pub = 'Publico';
    }
    echo utf8_decode("<div class='showback'>
        <h2>$reg->nombre         
        <span class='badge bg-warning'> $pub</span> </h2>
        <h4>Descripcion:</h4>
        <p>$reg->descripcion</p>
        <h4>Fecha de creacion:</h4>
        <p>$reg->fecha_creacion</p>
    </div>");
}else {
    echo 0;
};

// echo utf8_encode("<button type='button' class='btn btn-primary'>Configuracion</button>");

echo utf8_encode("
    <ul class='nav nav-tabs' id='myTab' role='tablist'>
        <li class='nav-item'>
            <a class='nav-link' id='home-tab' data-toggle='tab' href='#generos' onclick='listar_prys($repo)' role='tab' aria-controls='generos' aria-selected='false'>Ramas</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' id='profile-tab' data-toggle='tab' href='#colaboradores' onclick='listar_colb($repo)' role='tab' aria-controls='colaboradores' aria-selected='false'>Colaboradores</a>
        </li>
        </ul>
        <div class='tab-content' id='myTabContent'>
    
");
echo utf8_encode("
    <div class='row tab-pane fade' id='generos' role='tabpanel' aria-labelledby='home-tab'>
        <div class='col-md-12'>
            <div class='content-panel'>
            <table class='table table-striped table-advance table-hover'>
                    <hr>
                <thead>
                    <tr>
                        <th><i class='fa fa-bullhorn'></i> Nombre</th>
                        <th><i class='fa fa-bullhorn'></i> Genero musical</th>
                        <th><i class='fa fa-bullhorn'></i> BPM</th>
                        <th><i class='fa fa-bullhorn'></i> Formato</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id='divregistros'>
");

echo utf8_encode("                             
                            </tbody>
                        </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row --> 
<div class='row tab-pane fade' id='colaboradores' role='tabpanel' aria-labelledby='profile-tab'>
                <div class='col-md-12'>
                    <div class='content-panel'>
                        <table class='table table-striped table-advance table-hover'>
                                    <hr>
                                <thead>
                                    <tr>
                                        <th><i class='fa fa-bullhorn'></i> Colaborador</th>
                                        <th><i class='fa fa-bullhorn'></i> Tipo de colaborador</th>
                                    </tr>
                                </thead>
                                <tbody id='divcolaboradores'>
              ");

echo utf8_encode(" 
                            </tbody>
                        </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row --> 
    <div class='tab-pane fade' id='config' role='tabpanel' aria-labelledby='contact-tab'>
        <div class='col-md-12'>
            <div class='content-panel'>
                <form action='' method='post'>

") ;
    

?>