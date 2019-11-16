<?php

require_once("conexion.php");

$name1= false;
$lastname1= false;
$username = false;
$email = false;
$password = false;
$cpassword = false;

if(isset($_POST['submit'])){

    try{
  
        $cnx->beginTransaction();

        if(empty($name)){
            echo "<p class='error'>* Enter Here Your Name</p>";
        }else{
            $name1=true;
        }

        if(empty($lastname)){
            echo "<p class='error'>* Enter Here Your Lastname</p>";
        }else{
            $lastname1=true;
        }

        $rs = $cnx->query("SELECT COUNT(*) as valor FROM usuario WHERE username='$username'")  or $resp=0;
	    $reg = $rs->fetchObject();
	    $username2 = $reg->valor;

        if(empty($username)){
            echo "<p class='error'>* Enter Here Your Username</p>";
        }elseif ($username2==1) {
            echo "<p class='error'>* This username remains at an account</p>";
        }else{
            $username1=true;
        }

        $rs = $cnx->query("SELECT COUNT(*) as email FROM usuario WHERE username='$email'")  or $resp=0;
	    $reg = $rs->fetchObject();
	    $email2 = $reg->email;
       

        if(empty($email)){
            echo "<p class='error'>* Enter Here Your Email</p>";
        }elseif ($email2==1) {
            echo "<p class='error'>* This email remains at an account</p>";
        }else{
            $email1=true;
        }

        if(empty($password)){
            echo "<p class='error'>* Enter Here Your Password</p>";
        }else{
            $password1=true;
        }

        if(empty($cpassword)){
            echo "<p class='error'>* Enter Here Your Confirme Password</p>";
        }else{
    
            $cpassword=true;
        }


        if($imgload=="true" and $name1=="true" and  $lastname1=="true" and $username=="true" and  $email=="true" and $password1=="true" and $cpassword=="true"){
            if($password==$cpassword){
                move_uploaded_file ($_FILES['img']['tmp_name'], $add);

                $a=$cnx->prepare("INSERT INTO USUARIO (idusuario,nombre,apellido,nombreusuario,correo,fecha_registro,contraseña,tipousuario_idtipousuario,foto)VALUES((SELECT COALESCE(max(idusuario),0)+1 FROM usuario),'$name','$lastname','$username','$email',CURRENT_DATE,$password,1,'$add')");
	            $a->execute();
            }
            if ($resp =1 ){
                session_start();
                $_SESSION['idusuario']= $idusuario;
                $_SESSION['nombreusuario']= $nombreusuario;
                header("location: index.php");
            }else{
                header("location: home.php");
            }
        }


    $cnx->commit();
    } catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}

}
?>