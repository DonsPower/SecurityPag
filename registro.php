<?php
  require 'conexion/database.php';
  $message = '';


  //Verificamos que los campos no esten vacios.
if (!empty($_POST['name']) && !empty($_POST['first']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  $nombre= mysql_real_escape_string($_POST['name']);
  $username=mysql_real_escape_string($_POST['first']);
  $email=mysql_real_escape_string($_POST['email']);
  $password=mysql_real_escape_string($_POST['password']);
  $password=md5($password);
  //SHA(
    $sql="INSERT INTO usuario VALUES(null,'$nombre','$username','$email','$password')";
      $ejecutar=mysql_query($sql);
     //Condicion de si se creo o no el usuario.
     if(!$ejecutar){
       $message = 'Sorry there must have been an issue creating your account';
     }else{

         $message = 'Successfully created new user';
     }
  }


 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Registro | DonsWeb</title>
     <!--Apartado para los CSS-->
     <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
     <header>
       <div class="contenedor">

         <nav>
           <ul>
             <li><a href="index.html">Inicio</a></li>
             <li><a href="inicioSesion.php">Iniciar Sesion</a></li>
             <li class="actual"><a href="registro.php">Registro</a></li>
             <li><a href="sabermas.html">¿Quienes somos?</a></li>

           </ul>
         </nav>
         <div id="marca">
           <h1><span class="resaltado">MetaWars-</span>Registro</h1>
         </div>
       </div>
     </header>
     <div class="cuadroSesion">
       <img id="logo" width="100%"  height="100%" src="img/LogoDonsInc.jpg">
     </div>
     <!--verificamos mensaje-->

      <hr style="color:black;" size="6%" />
       <div class="cuadromedioRegistro">
         <div class="inicioSesionText">
           <p>Register   in to New Account</p>
         </div>

         <?php if(!empty($message)): ?>
           <div class="errorRojo">
              <p align="center"> <?= $message ?></p>
           </div>
        <?php endif; ?>
        <form action="registro.php" method="POST">
         <div class="emailandpas">
           <p>Name</p>
           <input type="text" name="name" id="name" placeholder="Enter your name" maxlength="30" required autofocus
           title="Escribe tu nombre completo.">
           <p>Username</p>
           <input type="text" name="first" class="input1" placeholder="Enter your username" maxlength="20" required autofocus>
           <p>Email</p>
           <input type="email" name="email" placeholder="Enter email" required autofocus
           title="Introduce tu contraseña">
           <p>Password</p>
           <input type="password" name="password" placeholder="Enter your password" required autofocus
           title="Introduce tu contraseña">
         </div>
          <div class="divbotones">
            <input type="submit" class="boton_personalizado" value="Registrarte." >
          </div>
         </form>
         </div>
       </div>

   </body>
 </html>
