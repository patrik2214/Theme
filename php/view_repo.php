<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$repo = $_POST['idrepo'];

$sql="SELECT repositorio.* , desarrollador.*, usuario.nombre as usser FROM repositorio 
    inner join desarrollador on repositorio.idREPOSITORIO = desarrollador.REPOSITORIO_idREPOSITORIO 
    inner join usuario on desarrollador.USUARIO_idUSUARIO=usuario.idUSUARIO
    where repositorio.idREPOSITORIO = $repo";
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
        <li class='nav-item'>
            <a class='nav-link' id='contact-tab' data-toggle='tab' href='#config' role='tab' aria-controls='config' aria-selected='false'>Configuracion</a>
        </li>
        </ul>
        <div class='tab-content' id='myTabContent'>
    
");
echo utf8_encode("
    <div class='row tab-pane fade' id='generos' role='tabpanel' aria-labelledby='home-tab'>
        <div class='col-md-12'>
            <div class='content-panel'>
            <table class='table table-striped table-advance table-hover'>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#new_rama' >Agregar una rama </button> <br>
                    <hr>
                <thead>
                    <tr>
                        <th><i class='fa fa-bullhorn'></i> Genero musical</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id='divregistros'>
");

// $query="SELECT * FROM proyecto inner join genero on proyecto.GENERO_idGENERO = genero.idGENERO
// where proyecto.REPOSITORIO_idREPOSITORIO = $repo";
// $rs = $cnx->query($query);
// while ($re = $rs->fetchObject()){   
//     echo utf8_encode("    
//                               <tr>
//                                   <td><a href='#'>$re->descripcion</a></td>
//                                   <td>
//                                       <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
//                                       <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
//                                       <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
//                                   </td>
//                               </tr>");
// };

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
                                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#new_colab'>Agregar un colaborador </button> <br>
                                    <hr>
                                <thead>
                                    <tr>
                                        <th><i class='fa fa-bullhorn'></i> Colaborador</th>
                                        <th><i class='fa fa-bullhorn'></i> Tipo de colaborador</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id='divcolaboradores'>
              ");

// $query="SELECT * FROM desarrollador  inner join usuario on desarrollador.USUARIO_idUSUARIO=usuario.idUSUARIO
// where desarrollador.REPOSITORIO_idREPOSITORIO = $repo";
// $rs = $cnx->query($query);
// while($re = $rs->fetchObject()){
//     $tipodev = 'Invitado';
//     if ($re->TIPODESARROLLADOR_idTIPODESARROLLADOR==1){
//         $tipodev = 'Propietario';
//     }
//     echo utf8_encode("     
//          <tr>
//             <td><a href='#'>$re->nombre</a></td>
//             <td>$tipodev</td>
//             <td>
//                 <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
//                 <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
//                 <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
//             </td>
//         </tr>
//     ");
// }

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

$result = $cnx->query($sql);
if ($reg = $result->fetchObject()){
echo utf8_encode("
    <div class='form-group'>
        <label for='nombre_repo'>Nombre del repositorio:</label>
        <input type='text' class='form-control' id='nombre_repo' name='nombre_repo' value='$reg->nombre' autofocus>
    </div>
    <div class='form-group'>
        <label>Describe tu nuevo proyecto</label>
        <textarea class='form-control' id='about_repo' name='about_repo'  rows='3'>$reg->descripcion</textarea>
    </div>
    
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' value='0' id='privado'>
        <label class='form-check-label' >
            Hacer privado
        </label>
    </div>
    <button type='button' onclick='update_repo()' class='btn btn-primary'>Save changes</button>
    </form>
    </div>
</div>
");
}
    

?>