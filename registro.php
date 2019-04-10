<?php
  require 'conexion/database.php';
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
             <li class="actual"><a href="index.html">Inicio</a></li>
             <li><a href="inicioSesion.php">Iniciar Sesion</a></li>
             <li><a href="registro.php">Registro</a></li>
             <li><a href="sabermas.html">¿Quienes somos?</a></li>

           </ul>
         </nav>
         <div id="marca">
           <h1><span class="resaltado">DonsWeb-</span>Registro</h1>
         </div>
       </div>
     </header>
     <div class="cuadroSesion">
       <img id="logo" width="100%"  height="100%" src="img/LogoDonsInc.jpg">
     </div>
      <hr style="color:black;" size="6%" />
     <form class="" action="index.html" method="post">
       <div class="cuadromedioRegistro">
         <div class="inicioSesionText">
           <p>Register   in to New Account</p>
         </div>
         <form class="" action="index.html" method="post">


         <div class="emailandpas">
           <p>Name</p>
           <input type="text" id="email" name="name" placeholder="Enter your name">
           <p>Surnames</p>
           <input type="password" name="surnames" class="input1" placeholder="Enter your first name">
           <p>Email</p>
           <input type="text" id="email" name="email" placeholder="Enter email">
           <p>Password</p>
           <input type="text" id="email" name="email" placeholder="Enter your password">
         </div>
         <div class="divbotones">
           <input type="button" class="boton_personalizado" name="registrar" value="Registrarte." >
         </div>
         </div>
       </div>
     </form>
   </body>
 </html>
