<?php
require_once("conexion.php");

session_start();
$user =  $_SESSION['idusuario'];

$repo = $_POST['idrepo'];

$sql="SELECT * FROM repositorio inner join desarrollador on repositorio.idREPOSITORIO = desarrollador.REPOSITORIO_idREPOSITORIO 
    where desarrollador.USUARIO_idUSUARIO = $user and desarrollador.TIPODESARROLLADOR_idTIPODESARROLLADOR=1 and repositorio.idREPOSITORIO = $repo";
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

    echo utf8_encode("<button type='button' class='btn btn-primary'>Configuracion</button>");

    // intento de tabla de integrantes
    echo utf8_encode("
        <div class='row mt'>
                  <div class='col-md-12'>
                      <div class='content-panel'>
                          <table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Advanced Table</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Company</th>
                                  <th class='hidden-phone'><i class='fa fa-question-circle'></i> Descrition</th>
                                  <th><i class='fa fa-bookmark'></i> Profit</th>
                                  <th><i class=' fa fa-edit'></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td><a href='basic_table.html#'>Company Ltd</a></td>
                                  <td class='hidden-phone'>Lorem Ipsum dolor</td>
                                  <td>12000.00$ </td>
                                  <td><span class='label label-info label-mini'>Due</span></td>
                                  <td>
                                      <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                      <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
                                      <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <a href='basic_table.html#'>
                                          SHART co
                                      </a>
                                  </td>
                                  <td class='hidden-phone'>Lorem Ipsum dolor</td>
                                  <td>17900.00$ </td>
                                  <td><span class='label label-warning label-mini'>Due</span></td>
                                  <td>
                                      <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                      <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
                                      <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <a href='basic_table.html#'>
                                          Another Co
                                      </a>
                                  </td>
                                  <td class='hidden-phone'>Lorem Ipsum dolor</td>
                                  <td>14400.00$ </td>
                                  <td><span class='label label-success label-mini'>Paid</span></td>
                                  <td>
                                      <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                      <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
                                      <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <a href='basic_table.html#'>
                                          SHART ext
                                      </a>
                                  </td>
                                  <td class='hidden-phone'>Lorem Ipsum dolor</td>
                                  <td>22000.50$ </td>
                                  <td><span class='label label-success label-mini'>Paid</span></td>
                                  <td>
                                      <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                      <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
                                      <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                                  </td>
                              </tr>
                              <tr>
                                  <td><a href='basic_table.html#'>Total Ltd</a></td>
                                  <td class='hidden-phone'>Lorem Ipsum dolor</td>
                                  <td>12120.00$ </td>
                                  <td><span class='label label-warning label-mini'>Due</span></td>
                                  <td>
                                      <button class='btn btn-success btn-xs'><i class='fa fa-check'></i></button>
                                      <button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button>
                                      <button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
    
    
    "

    );

}else {
    echo 0;
}

?>