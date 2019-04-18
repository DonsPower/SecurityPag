<?php

  session_start();
  require 'conexion/database2.php';

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

  <?php else: ?>
    <h1>ERROR</h1><li><a href="logout.php">Cerrar sesion	</a></li>

<?php endif; ?>
  </body>
</html>
