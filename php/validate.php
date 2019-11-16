<?php

require_once("connect.php");

$name = $_POST['txtname'];
$lastname = $_POST['txtlastname'];
$username = $_POST['txtusername'];
$email = $_POST['txtemail'];
$password = $_POST['txtpass'];
$cpassword = $_POST['txtcpass'];

echo var_dump($_POST);
//echo var_dump($_FILES);
//Subir la Imagen
//Creamos una variable para ver si se sube o no el archivo
$imgload=true;
$name1= false;
$lastname1= false;
$username1 = false;
$email1 = false;
$password1 = false;
$cpassword1 = false;
$resp=1;

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

try{
  
    $cnx->beginTransaction();

    $rs = $cnx->query("SELECT COUNT(*) as email FROM usuario WHERE correo='$email'") or $resp=0;
	$reg = $rs->fetchObject();
	$email2 = $reg->email;

    $rs = $cnx->query("SELECT COUNT(*) as valor FROM usuario WHERE nombreusuario='$username'") or $resp=0;
	$reg = $rs->fetchObject();
    $username2 = $reg->valor;

    $rs = $cnx->query("SELECT COALESCE(max(idusuario),0)+1 FROM usuario") or $resp=0;
	$reg = $rs->fetchObject();
    $idusuario = $reg->valor;
    

    
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

    if(empty($username)){
        echo "<p class='error'>* Enter Here Your Username</p>";
    }elseif ($username2==1) {
        echo "<p class='error'>* This username remains at an account</p>";
    }else{
        $username1=true;
    }
  
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
        $cpassword1=true;
    }

    echo "img = $imgload, name = $name1, lastname = $lastname1, username = $username1, email = $email1, password = $password1, cpassword = $cpassword1";
    if($imgload==true and $name1==true and  $lastname1==true and $username1==true and  $email1==true and $password1==true and $cpassword1==true){
        if($password==$cpassword){
            move_uploaded_file ($_FILES['img']['tmp_name'], $add);
            
            $sql="INSERT INTO USUARIO VALUES('$idusuario','$name','$lastname','$username','$email',CURRENT_DATE,'$password',1,'$add')";
            $resp=1;
            $cnx->query($sql) or $resp=0;

        }else{
            $resp=0;
        }

    }


    $cnx->commit();
} catch(PDOException $x) { 
    $cnx->rollBack();
    $resp=0; 
}

 if ($resp==1 ){
     session_start();
     $_SESSION['idusuario']= $idusuario;
     $_SESSION['nombreusuario']= $nombreusuario;
     header("location: galery.php");
 }else{
     header("location: home.php");
}
#echo $resp;

?>