<?php
require_once("conexion.php");

$name1= false;
$lastname1= false;
$username1 = false;
$email1 = false;
$password1 = false;
$cpassword1 = false;

if(isset($_POST['submit'])){
    $captcha=$_POST['g-recaptcha-response'];

    //Clave de captcha 
    $secretKey = "6LfpPboUAAAAAHb3--UcUTOVgftFH8HneL2V2guI";    
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    // falta validar repuesta del captcha

    if(!$captcha){
        echo "<script> alert('Complete el captcha'); window.location.href='register.php';</script>";
        exit;
    }else{

        $resp=1;

        // como que email1 lo metes aca si arriba le pones falso
        $rs = $cnx->query("SELECT COUNT(*) as email FROM usuario WHERE correo='$email'") or $resp=0;
        $reg = $rs->fetchObject();
        $email2 = $reg->email;
    
        #echo $email2;
        // username tampoco existe
        $rs = $cnx->query("SELECT COUNT(*) as valor FROM usuario WHERE nombreusuario='$username'") or $resp=0;
        $reg = $rs->fetchObject();
        $username2 = $reg->valor;
    
        #echo $username2;

        $rs = $cnx->query("SELECT COALESCE(max(idusuario),0)+1 as valor FROM usuario") or $resp=0;
        $reg = $rs->fetchObject();
        $idusuario = $reg->valor;


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
        }
    
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
    
        if(empty($password)){
            echo "<p class='error'>* Enter Here Your Password</p>";
        }elseif (strlen($password)>41) {
            echo "<p class='error'>* Your Password can't have more than 41 chars</p>";
        }
        else{
            $password1=true;
        }
    
        if(empty($cpassword)){
            echo "<p class='error'>* Enter Here Your Confirme Password</p>";
        }elseif (strlen($password)>41) {
            echo "<p class='error'>* Your Password can't have more than 41 chars</p>";
        }
        else{
            $cpassword1=true;
        }
        if($imgload==true){
            if($name1==true and  $lastname1==true and $username1==true and  $email1==true and $password1==true and $cpassword1==true){
                if($password==$cpassword){

                    move_uploaded_file ($_FILES['img']['tmp_name'], $add);
                
                    $a=$cnx->query("INSERT INTO USUARIO(idusuario,nombre,apellido,nombreusuario,correo,fecha_registro,password,idTIPOUSUARIO,foto,estado) 
                    VALUES($idusuario,'$name','$lastname','$username','$email',current_date,'$password',1,'$add',true)") or $resp=0;
                    #echo "Registrado Correctamente";
                }
            }
        }else{
            if($name1==true and  $lastname1==true and $username1==true and  $email1==true and $password1==true and $cpassword1==true){
                if($password==$cpassword){

                    $a=$cnx->query("INSERT INTO USUARIO(idusuario,nombre,apellido,nombreusuario,correo,fecha_registro,password,idTIPOUSUARIO,foto,estado) 
                    VALUES($idusuario,'$name','$lastname','$username','$email',current_date,'$password',1,'../assets/img/user.png',true)")  or $resp=0;
                    #echo "Registrado Correctamente";
                
                }
            }
        }  

        if($resp==1){
            echo "REGISTER CORRECT!" ;
        }else{
            echo "ERROR";
        }

    }



}
 
?>
