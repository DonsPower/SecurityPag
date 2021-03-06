<?php

  error_reporting(0);
//Iniciamos secion.
ini_set('session.use_only_cookies', true);
session_start();
  
  $salt = 'SHIFLETT';
  $identifier = md5($salt . md5($username . $salt));
  $token = md5(uniqid(rand(), TRUE));
  $timeout = time() + 60 * 60 * 24 * 7;
  setcookie('auth', "$identifier:$token", $timeout);


  if (isset($_SESSION['username']))
  {
    header('Location: intropage.php');
  }
require 'conexion/database2.php';
  if (!empty($_POST['pass']) && !empty($_POST['username']))
  {
    $usernam=mysql_real_escape_string($_POST['username']);
    $usernam=strip_tags($usernam);
    $usernam = str_replace("'", "", $usernam);
    $usernam = str_replace('"', '', $usernam);
    #SETEO DE COOKIE
    $salt = 'SHIFLETT';
    $identifier = md5($salt . md5($username . $salt));
    $token = md5(uniqid(rand(), TRUE));
    $timeout = time() + 30 * 30 * 24 * 7;

    setcookie('auth', "$identifier:$token", $timeout);

    $records = $conn->prepare('SELECT * FROM usuario WHERE user = :users');
    $records->bindParam(':users', $usernam);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    $pasw=mysql_real_escape_string($_POST['pass']);
    $pasw=strip_tags($pasw);
    $pasw = str_replace("'", "",$pasw);
    $pasw = str_replace('"', '', $pasw);
    $a="clave_prueba";
    $pasw=md5($a.(md5($pasw)));
    if (count($results) >0 && $results['password']==$pasw )
    {
      $_SESSION['username'] = $results['user'];
        header("Location: intropage.php");
    }
    else
    {
        $message = 'Contraseña o usuario incorrectos';
    }
  }

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
             <li><a href="registro.php">Registro</a></li>
             <li><a href="sabermas.html">¿Quienes somos?</a></li>

           </ul>
         </nav>
         <div id="marca">
           <h1><span class="resaltado">MetaWars</span>-Iniciar sesión</h1>
         </div>
       </div>
     </header>
     <div class="cuadroSesion">
       <img id="logo" width="100%"  height="100%" src="img/LogoDonsInc.jpg">
     </div>

     <hr style="color:black;" size="6%" />
     <form action="inicioSesion.php" method="post" >
     <div class="cuadromedioInicioSesion">
        <div class="inicioSesionText">
          <p>Sign in to Your Account</p>
        </div>
        <div class="abajoText">
          <p>Don't have an account?<a href="registro.php">  Create one.</a></p>
        </div>
        <?php if(!empty($message)): ?>
          <div class="errorRojo">
             <p align="center"> <?= $message ?></p>
          </div>
       <?php endif; ?>
        <div class="emailandpas">
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter your username" maxlength="20" required autofocus>
          <p>Password</p>
          <input type="password" name="pass" class="input1" placeholder="Enter password"  required autofocus>
        </div>
        <div class="divbotones">
          <input type="submit" class="boton_personalizado" name="login" value="Entrar" >
          <input type="button" class="boton_personalizado" name="quienes" value="¿Olvidaste la contraseña?" onclick="alert('¡Pregunte al administrador!');">
        </div>

     </div>
   </form>
     <footer class="center">
       <p>DonsInc | 2018</p>
     </footer>
   </body>
 </html>
