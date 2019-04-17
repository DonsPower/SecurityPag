<?php
ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);
  require 'conexion/database.php';
    	if (isset($_SESSION['username']))
    	{
      	$records = $conn->prepare('SELECT * FROM usuario WHERE user = :user');
      	$records->bindParam(':user', $_SESSION['username']);
      	$records->execute();
      	$results = $records->fetch(PDO::FETCH_ASSOC);
      	$user = null;
      	if (count($results) > 0)
      	{
        		$user = $results;
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
     	<?php if(!empty($user)): ?>
        <header>
          <div class="contenedor">
            <div id="marca">
              <h1><span class="resaltado">Bienvenido</span><br><?= $user['user']; ?></h1>
            </div>
            <nav>
              <ul>
                <li>Te has conectado correctamente.</li>
                <li><a href="logout.php">Cerrar sesion	</a></li>

              </ul>
            </nav>
          </div>
        </header>

          <div class="imagenSupUser">

            <div class="divderUser">
              <form class="" action="../test.php" method="post">
                <button   type="submit" class="id" >
                  <div class="cuadrito2">
                  <p>Iniciar Test</p>
                  </div>
                  <br>
                  <img src="../img/menu/test.png" alt="
                   texto alternativo" width="180" height="180">
                </button>
              </form>
            </div>
            <div class="divmidUser">
              <form class="" action="jugar/historia.php" method="post">
                <button   type="submit" class="id" >
                  <div class="cuadrito2">
                  <p>Jugar</p>
                  </div>
                  <br>
                  <img src="../img/menu/jugar.png" alt="
                   texto alternativo" width="180" height="180">
                </button>
              </form>
            </div>
            <div class="divizqUser">
              <form class="" action="../test.php" method="post">
                <button   type="submit" class="id" >
                  <div class="cuadrito2">
                  <p>Test Final</p>
                  </div>
                  <br>
                  <img src="../img/menu/tienda.png" alt="
                   texto alternativo" width="180" height="180">
                </button>
              </form>
            </div>
          </div>

          <footer>
              <p>DonsInc, Copyright &copy; 2018</p>
          </footer>
        <?php else: ?>
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
           <h1><span class="resaltado">DonsWeb</span>-Iniciar sesión</h1>
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
          <?php if(!empty($message)): ?>
              <p> <?= $message ?></p>
          <?php endif; ?>
        <div class="abajoText">
          <p>Don't have an account?<a href="registro.php">  Create one.</a></p>
        </div>

        <div class="emailandpas">
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter your username"  required autofocus>
          <p>Password</p>
          <input type="password" name="password" class="input1" placeholder="Enter password"  required autofocus>
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
       <?php endif; ?>
   </body>
 </html>
