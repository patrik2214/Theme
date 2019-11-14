<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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
    <title>Shart - Inicia sesion</title>
  </head>
  <body>
    <div class="container">
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
          
          <!-- Icon -->
          <div class="fadeIn first">
            <img src="images/user.png" id="icon" alt="User Icon" />
          </div>

          <div>
            <h5>Inicia sesion</h5>
          </div>
          <!-- Login Form -->
          <form action="user_validation.php" method="post">
            <input
              type="text"
              id="usuario"
              class="fadeIn second"
              name="usuario"
              placeholder="Usuario"
            />
            <?php
                $variable = isset($_GET['mensaje']) ? $_GET['mensaje'] : null ;			                                                               
                if($variable=='errorCredenciales') {
            ?>
                <div class="alert alert-danger" role="alert">
                    <p>Username o password incorrectos</p>
                </div>
                
            <?php
                }
            ?> 
            <input type="submit" class="fadeIn fourth" value="Continuar" />

          </form>

          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">Crear cuenta</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
