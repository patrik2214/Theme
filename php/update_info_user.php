<?php

requiere_once(conexion.php);

session_start();
$idusuario = $_SESSION['idusuario'];

$name = $_POST['txtname'];
$lastname = $_POST['txtlastname'];
$username = $_POST['txtusername'];
$email = $_POST['txtemail'];
$password = $_POST['txtpass'];
$cpassword = $_POST['txtcpass'];

//Subir la Imagen
//Creamos una variable para ver si se sube o no el archivo
$imgload=true;

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
//seteamos la ruta de la carpeta
$add="uploads/$file_name";
//lo movemos del temporal a la carpeta

if(!$captcha){
    echo "<script> alert('Complete el captcha'); window.location.href='index.html';</script>";
    exit;
    }
    //Clave de captcha 
    $secretKey = "6LfpPboUAAAAAHb3--UcUTOVgftFH8HneL2V2guI";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);

if(empty($name)){
    echo "<p class='error'>* Enter Here Your Name</p>";
}elseif (strlen($name)>45) {
    echo "<p class='error'>* Your Name can't have more than 45 chars</p>";
}else{
    $name1=true;
}
    
if(empty($lastname)){
    echo "<p class='error'>* Enter Here Your Lastname</p>";
}elseif (strlen($lastname)>45) {
    echo "<p class='error'>* Your Lastname can't have more than 45 chars</p>";
}else{
    $lastname1=true;
}
    
if(empty($username)){
    echo "<p class='error'>* Enter Here Your Username</p>";
}elseif (strlen($username)>45) {
    echo "<p class='error'>* Your Username can't have more than 45 chars</p>";
}
else{
    $username1=true;
}
      
if(empty($email)){
    echo "<p class='error'>* Enter Here Your Email</p>";
}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo "<p class='error'>* This email is incorrect</p>";
}else{
    $email1=true;
}
    
if(empty($password)){
    echo "<p class='error'>* Enter Here Your Password</p>";
}elseif (strlen($password)>41) {
    echo "<p class='error'>* Your Password can't have more than 41 chars</p>";
}else{
    $password1=true;
}
    
if(empty($cpassword)){
    echo "<p class='error'>* Enter Here Your Confirme Password</p>";
}elseif (strlen($password)>41) {
    echo "<p class='error'>* Your Password can't have more than 41 chars</p>";
}else{
    $cpassword1=true;
}
    
if($imgload==true and $name1==true and  $lastname1==true and $username1==true and  $email1==true and $password1==true and $cpassword1==true){
    if($password==$cpassword){
       move_uploaded_file ($_FILES['img']['tmp_name'], $add);
                
        $sql="UPDATE USUARIO SET nombre='$name',apellido='$lastname',nombreusuario='$username',correo='$email',contraseña='$password',tipousurio_idtipousuario=1,foto='$add' WHERE='$idusuario'";
        $resp=1;
        $cnx->query($sql) or $resp=0;
    
    }
    
}

?>