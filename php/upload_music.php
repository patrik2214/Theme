<?php
require_once("conexion.php");
require ("class.bpm.php");

$pry = $_POST['idproyecto'];
$des = $_POST['des_pista'];

$resp=1;
$query="SELECT * FROM proyecto
where proyecto.idproyecto = $pry";
$rs = $cnx->query($query) or die($query);
$rcd = $rs->fetchObject();
$reg = $rcd->formato;
$getbpm = $rcd->bpm;


if (isset($_FILES['uploadedfile']) ) {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedfile']['tmp_name'];
    $fileName = $_FILES['uploadedfile']['name'];
    $fileSize = $_FILES['uploadedfile']['size'];
    //$fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // $allowedfileExtensions = array('mp3','mpeg','ogg','wav','flac','raw');
    // in_array($fileExtension, $allowedfileExtensions)
    if ($fileExtension == $reg) {
        // directory in which the uploaded file will be moved
        $uploadFileDir = "../music/$fileName";
        // $dest_path = $uploadFileDir .$fileName;

        if(move_uploaded_file($fileTmpPath, $uploadFileDir)) {
            // $bpm_detect = new bpm_detect($wavfile);  
            // $test = $bpm_detect->detectBPM();

            $sql ="SELECT COALESCE(max(idpistas),0)+1 as ultimo FROM pistas";
            $rs = $cnx->query($sql)  or die($sql);
            $reg = $rs->fetchObject();
            $idrecord = $reg->ultimo;

            $query ="INSERT INTO pistas (idpistas, url, idproyecto, title, description) 
                VALUES($idrecord,'$fileName',$pry, '$fileName', '$des')";
            $b=$cnx->query($query) or die($sql);

        } else {
            $resp=0;
        }

    }else {
            $resp=5;
    }
}else{
    $resp='el delfin hasta el fin';
}
echo $resp;

?>

