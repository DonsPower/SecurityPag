<?php
  require 'conexion/database.php';
  $message = '';


  //Verificamos que los campos no esten vacios.
if (!empty($_POST['name']) && !empty($_POST['first']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  $nombre= mysql_real_escape_string($_POST['name']);
  $nombre=strip_tags($nombre);
  $nombre = str_replace("'", "", $nombre);
  $nombre = str_replace('"', '', $nombre);
  //echo $nombre;
  $username=mysql_real_escape_string($_POST['first']);
  $username=strip_tags($username);
  $username = str_replace("'", "", $username);
  $username = str_replace('"', '', $username);
  $email=mysql_real_escape_string($_POST['email']);
  $email=strip_tags($email);
  $email = str_replace("'", "", $email);
  $email = str_replace('"', '', $email);
  $password=mysql_real_escape_string($_POST['password']);
  $password=strip_tags($password);
  $password = str_replace("'", "", $password);
  $password= str_replace('"', '',$password);
  $error_encontrado="";
  $error_encontrado2="";
  if(validar_nombre($nombre, $errorencontrado2)){
    if (validar_clave($password, $error_encontrado)){
        $a="clave_prueba";
        $password=md5($a.(md5($password)));
        $sql="INSERT INTO usuario VALUES(null,'$nombre','$username','$email','$password')";
          $ejecutar=mysql_query($sql);
         //Condicion de si se creo o no el usuario.
         if(!$ejecutar){
           $message = 'Sorry there must have been an issue creating your account';
         }else{

             $message = 'Successfully created new user';
         }
      }else{
        $message= "PASSWORD NO VÁLIDO: " . $error_encontrado;
      }
    }else{
      $message= "Nombre incorrecto " . $errorencontrado2;
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
           <input type="text" name="name" id="name" placeholder="Enter your name" maxlength="31" required autofocus
           title="Escribe tu nombre completo.">
           <?php
           function validar_nombre($nombre2,&$error_clave2){
             if(strlen($nombre2) < 3){
               $error_clave2 = "El nombre debe tener al menos 3 caracteres";
               return false;
             }
             if(strlen($nombre2) > 30){
               $error_clave2 = "El nombre no puede tener más de 32 caracteres";
               return false;
             }
             if (preg_match('`[0-9]`',$nombre2)){
              $error_clave2 = "El nombre no debe de tener numeros";
              return false;
            }
            $error_clave2 = "";
            return true;
          }
            ?>
           <p>Username</p>
           <input type="text" name="first" class="input1" placeholder="Enter your username" maxlength="20" required autofocus>
           <p>Email</p>
           <input type="email" name="email" placeholder="Enter email" required autofocus
           title="Introduce tu contraseña">
           <p>Password</p>
           <?php
           function validar_clave($clave,&$error_clave){
             if(strlen($clave) < 10){
               $error_clave = "La clave debe tener al menos 10 caracteres";
               return false;
             }
             if(strlen($clave) > 30){
               $error_clave = "La clave no puede tener más de 30   caracteres";
               return false;
             }
             if (!preg_match('`[a-z]`',$clave)){
               $error_clave = "La clave debe tener al menos una letra minúscula";
               return false;
            }
            if (!preg_match('`[A-Z]`',$clave)){
              $error_clave = "La clave debe tener al menos una letra mayúscula";
              return false;
            }
            if (!preg_match('`[0-9]`',$clave)){
              $error_clave = "La clave debe tener al menos un caracter numérico";
              return false;
            }
            $error_clave = "";
            return true;
          }
            ?>
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
