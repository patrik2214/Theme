<?php
require_once("conexion.php");

$idusuario = $_POST['idusuario'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];


$name1= false;
$lastname1= false;
$username1 = false;
$email1 = false;
$resp=1;

//Subir la Imagen
//Creamos una variable para ver si se sube o no el archivo
$imgload=true;

if($_FILES['img']['name']==null){
    $imgload=false;
}else{
    //Seteamos nombre, tipo y tamaño del archivo
    $file_name=$_FILES['img']['name'];
    $img_size=$_FILES['img']['size'];
    $file_type=$_FILES['img']['type'];

    //verificamos tamaño
    if ($img_size>200000){
        $imgload=false;
    }
    //verificamos que solo sea imagen
    if (!($file_type =="image/jpeg" or $file_type=="image/gif")){
        // Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
        $imgload=false;
    }
}

    

    $rs = $cnx->query("SELECT COUNT(*) as email FROM usuario WHERE correo='$email'") or $resp=0;
    $reg = $rs->fetchObject();
    $email2 = $reg->email;

    #echo $email2;


    // username tampoco existe
    $rs = $cnx->query("SELECT COUNT(*) as valor FROM usuario WHERE nombreusuario='$username'") or $resp=0;
    $reg = $rs->fetchObject();
    $username2 = $reg->valor;

    #echo $username2

    if(empty($name)){
        echo "<p class='error'>* Enter Here Your Name</p>";
    }elseif (strlen($name)>45) {
        echo "<p class='error'>* Your Name can't have more than 45 chars</p>";
    }
    else{
        $name1=true;
    }

    if(empty($lastname)){
        echo "<p class='error'>* Enter Here Your Lastname</p>";
    }elseif (strlen($lastname)>45) {
        echo "<p class='error'>* Your Lastname can't have more than 45 chars</p>";
    }
    else{
        $lastname1=true;
    

    if(empty($username)){
        echo "<p class='error'>* Enter Here Your Username</p>";
    }elseif ($username2==1) {
        echo "<p class='error'>* This username remains at an account</p>";
    }elseif (strlen($username)>45) {
        echo "<p class='error'>* Your Username can't have more than 45 chars</p>";
    }
    else{
        $username1=true;
    }
  
    if(empty($email)){
        echo "<p class='error'>* Enter Here Your Email</p>";
    }elseif ($email2==1) {
        echo "<p class='error'>* This email remains at an account</p>";
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo "<p class='error'>* This email is incorrect</p>";
    }else{
        $email1=true;
    }

 

    if($imgload==true){
        if ($name1==true and  $lastname1==true and $username1==true and  $email1==true){
       
            move_uploaded_file ($_FILES['img']['tmp_name'], $add);      
            $c=$cnx->query("UPDATE USUARIO SET nombre='$name',apellido='$lastname',nombreusuario='$username',correo='$email',foto='$add' WHERE idusuario=$idusuario") or $resp=0;

        }
    }else{
        if ($name1==true and  $lastname1==true and $username1==true and  $email1==true){
            $c=$cnx->query("UPDATE USUARIO SET nombre='$name',apellido='$lastname',nombreusuario='$username',correo='$email' WHERE idusuario='$idusuario'") or $resp=0;

            }
        }
   
    }

    echo $resp ;

?>