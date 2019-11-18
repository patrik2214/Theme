<?php

requiere_once("conexion.php");

$idusuario = $_POST['idusuario'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['pass'];
$cpassword = $_POST['cpass'];

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