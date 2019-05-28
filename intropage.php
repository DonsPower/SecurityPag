<?php

  session_start();
  require 'conexion/database2.php';
  //Comprueba si una variable esta definida o no
  if (isset($_SESSION['username']))
  {
    $records = $conn->prepare('SELECT * FROM usuario WHERE user = :users');
    $records->bindParam(':users', $_SESSION['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0)
    {   echo $user;
        $user = $results;

    }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenido | DonsWeb</title>
    <!--Apartado para los CSS-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/pagInicio.css">
    <link rel="stylesheet" href="css/boton.css">
  </head>
  <body>
    <?php if(!empty($user)): ?>
      <header>
        <div class="contenedor">
          <div id="marca">
            <h1><span class="resaltado">Bienvenido</span>: <?= $user['user']; ?></h1>
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
          <form class="" action="src/test.php" method="post">
            <button   type="submit" class="id" >
              <div class="cuadrito2">
              <p>Apuntar Tarea</p>
              </div>
              <br>
              <img src="img/menu/test.png" alt="
               texto alternativo" width="230" height="230">
            </button>
          </form>
        </div>
        <div class="divmidUser">
          <form class="" action="src/jugar/historia.php" method="post">
            <button   type="submit" class="id" >
              <div class="cuadrito2">
              <p>Jugar</p>
              </div>
              <br>
              <img src="img/menu/jugar.png" alt="texto alternativo" width="230" height="230">
            </button>
          </form>
        </div>
        <div class="divizqUser">
          <form class="" action="src/test2.php" method="post">
            <button   type="submit" class="id" >
              <div class="cuadrito2">
              <p>Ver tareas</p>
              </div>
              <br>
              <img src="img/menu/tienda.png" alt=t"exto alternativo" width="230" height="230">
            </button>
          </form>
        </div>
      </div>
      <div class="eresProfe">
        <form class="" action="src/scoreboard.php" method="post">
          <button   type="submit" class="id" >
            <p>Scoreboard</p>
            <br>

          </button>
        </form>

      </div>



      <footer class="center">
        <p>DonsInc | 2018</p>
      </footer>

      <?php else: ?>
  <header>
    <div class="contenedor">
      <div id="marca">
        <h1><span class="resaltado">MetaWars</span> Rutas Metabolicas</h1>
        </div>
      </div>
    </header>
        <section id="boletin">
              <div class="contenedor"></div>
        </section>
        <div class="divSupLogin">
        <div class="divizqlogin">
          <div class="centrado">
              <a class="boton_personalizado"  href="index.html">Registro</a>
          </div>
        </div>
        <div class="divmidlogin"></div>
        <div class="divderlogin">
          <div class="centradoder">
              <a class="boton_personalizado" href="index.html">Iniciarsesion</a>
          </div>
        </div>
        </div>

          <footer class="center">
            <p>DonsInc | 2018</p>
          </footer>

<?php endif; ?>

  </body>
</html>
