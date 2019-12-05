<?php
require_once("conexion.php");

$pry = $_POST['idpry'];

$query="SELECT * FROM pistas where idproyecto=$pry";
$rs = $cnx->query($query);
while ($re = $rs->fetchObject()){   
    echo (" <div class='showback'>
                    <h4 class='card-title'>$re->title</h4>
                    <h6 class='card-subtitle mb-2 text-muted'>$re->description</h6>                         
                    <audio controls>
                        <source src='../music/$re->url' />
                        <p>Your user agent does not support the HTML5 Audio element.</p>
                    </audio>
                    <hr>
                    <button type='button'  onclick='delete_pistas($re->idpistas)' class='btn btn-round btn-danger'>Eliminar pista</button>
                </div>   
            ");
};
