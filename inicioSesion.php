<?php


require 'conexion/database.php';

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>DonsWeb| Inicio sesion</title>
     <!--Apartado para los CSS-->
     <link rel="stylesheet" href="css/main.css">
     <!--Apartado js-->
      <script type="text/javascript" src="js/teclas.js"></script>
   </head>
   <body >
     <header>
       <div class="contenedor">

         <nav>
           <ul>
             <li ><a href="index.html">Inicio</a></li>
             <li class="actual"><a href="inicioSesion.php">Iniciar Sesion</a></li>
             <li><a href="#">Registro</a></li>
             <li><a href="sabermas.html">¿Quienes somos?</a></li>

           </ul>
         </nav>
         <div id="marca">
           <h1><span class="resaltado">DonsWeb</span>-Iniciar sesión</h1>
         </div>
       </div>
     </header>
     <div class="cuadroSesion">
       <img id="logo" width="100%"  height="100%" src="img/LogoDonsInc.jpg">
     </div>
     <hr style="color:black;" size="6%" />
     <div class="cuadromedioInicioSesion">
        <div class="inicioSesionText">
          <p>Sign in to Your Account</p>
        </div>
        <div class="abajoText">
          <p>Don't have an account?<a href="#">  Create one.</a></p>
        </div>
        <div class="emailandpas">
          <p>Email</p>
          <input type="text" id="email" name="email" onclick="Color(this)">
          <p>Password</p>
          <input type="password" name="password" class="input1">
        </div>
        <div class="divbotones">
          <input type="button" class="boton_personalizado" name="Entrar" value="Entrar">

          <input type="button" class="boton_personalizado" name="quienes" value="¿Olvidaste la contraseña?" onclick="alert('¡Pregunte al administrador!');">
        </div>

     </div>
   </body>
 </html>
