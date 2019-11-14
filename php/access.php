<?php
session_start();
if(!isset($_SESSION['usuario'])) header("location: login.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <link rel="stylesheet" href="public/css/login.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/fa723842a6.js"
      crossorigin="anonymous"
    ></script>
    <title>Shart</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="images/user.png" id="icon" alt="User Icon" />
            </div>
            <div>
                <h5>
                    <?php
                  echo $_SESSION['usuario']; ?>
                </h5>
            </div>
            <form action="login_validation.php" method="post">
                <input type="password" id="pass" class="fadeIn third form-control" name="pass" placeholder="Contraseña" />
                <input type="submit" class="fadeIn fourth" value="Entrar"/>
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>    
        </div>
        </div>
    </div>
        
</body>
</html>