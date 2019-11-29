<?php
require_once("conexion.php");

$pry = $_POST['idproyecto'];
$name = $_POST['name_pista'];
$des = $_POST['des_pista'];

$resp=1;
// && $_FILES['uploadedfile']['error'] === UPLOAD_ERR_OK
if (isset($_FILES['uploadedfile']) ) {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedfile']['tmp_name'];
    $fileName = $_FILES['uploadedfile']['name'];
    $fileSize = $_FILES['uploadedfile']['size'];
    //$fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedfileExtensions = array('mp3','mpeg','ogg','wav','flac','raw');
    if (in_array($fileExtension, $allowedfileExtensions)) {
        // directory in which the uploaded file will be moved
        $uploadFileDir = "../music/$fileName";
        // $dest_path = $uploadFileDir .$fileName;
        if(move_uploaded_file($fileTmpPath, $uploadFileDir)) {
            $sql ="SELECT COALESCE(max(idpistas),0)+1 as ultimo FROM pistas";
            $rs = $cnx->query($sql)  or die($sql);
            $reg = $rs->fetchObject();
            $idrecord = $reg->ultimo;

            $query ="INSERT INTO pistas (idpistas, url, idproyecto, title, description) 
                VALUES($idrecord,'$fileName',$pry, '$name', '$des')";
            $b=$cnx->query($query) or die($sql);
        } else {
            $resp=0;
        }

    }else {
            $resp=0;
    }
}else{
    $resp='el delfin hasta el fin';
}
echo $resp;

?>
