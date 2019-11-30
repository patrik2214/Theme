<?php
require_once("conexion.php");

$pry = $_POST['idproyecto'];
$des = $_POST['des_pista'];


$resp=1;
// && $_FILES['uploadedfile']['error'] === UPLOAD_ERR_OK
if (isset($_FILES['uploadedfile']) ) {
    // get details of the uploaded file

    foreach($_FILES['uploadedfile']['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$fileName = $_FILES['uploadedfile']['name'][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            $fileSize = $_FILES['uploadedfile']['size'][$key];
            //$fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            
            $allowedfileExtensions = array('mp3','mpeg','ogg','wav','flac','raw');
            //AQUI PONER EL WHILE POR SI ME MANDA MAS ARCHIVOS4
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
                        VALUES($idrecord,'$fileName',$pry, '$fileName', '$des')";
                    $b=$cnx->query($query) or die($sql);
                } else {
                    $resp=0;
                }
                closedir($dir); //Cerramos el directorio de destino
            }else {
                    $resp=0;
            }
			
			
		}
	}

    

    
}else{
    $resp='el delfin hasta el fin';
}
echo $resp;

?>
