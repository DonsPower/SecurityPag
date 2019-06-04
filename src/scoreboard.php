<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Apartado para los CSS-->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/scoreboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <header>
    <div class="contenedor">

      <nav>
        <ul>
          <li class="actual"><a href="../intropage.php">Regresar</a></li>
          <li><a href="../sabermas.html">¿Quienes somos?</a></li>

        </ul>
      </nav>
      <div id="marca">
        <h1><span class="resaltado">Metawards</span></h1>
      </div>
    </div>
  </header>
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
  $message = '';
  require '../conexion/database2.php';
?>
<div class="jumbotron text-center">
<h1>Scoreboard</h1>
<p>Tabla de puntos realizados en el juego</p>
</div>
  <div class="cuadoScore">
  <table  class="table table-hover table-light">
	<thead >
    <tr>

      <th >ID</th>
      <th>NOMBRE</th>
      <th></th>
    </tr>
		</thead>

    <?php foreach ($conn->query('SELECT * from prueba') as  $row){ // aca puedes hacer la consulta e iterarla con each. ?>
      <tbody class="cuadoScore">
      <tr>

	       <td><?php echo $row['id'] ?></td>
         <td><?php echo $row['nom'] ?></td>
       </tr>
      </tbody>
       <?php

	     }
      ?>
      </table>
      </div>
</body>
</html>
