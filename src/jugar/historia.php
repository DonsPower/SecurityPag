<?php
  	session_start();
  	require '../../conexion/database2.php';
  	if (isset($_SESSION['username']))
  	{
    //	$records = $conn->prepare('SELECT * FROM nombre_tabla WHERE no_boleta = :boleta');
    //	$records->bindParam(':boleta', $_SESSION['no_boleta']);
      $records = $conn->prepare('SELECT * FROM usuario WHERE user = :users');
      $records->bindParam(':users', $_SESSION['username']);
    	$records->execute();
    	$results = $records->fetch(PDO::FETCH_ASSOC);
    	$user = null;
      		$user = $results;
  	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8"/>
	<title>Historia | MetWars</title>
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="../../css/pagInicio.css">
  <link rel="stylesheet" href="../../css/boton.css">
  <link rel="stylesheet" href="../../css/historia.css">
</head>
<body>
  <header>
    <div class="contenedor">
      <div id="marca">
        <h1><span class="resaltado">Usuario:</span> <?= $user['user']; ?></h1>
      </div>
      <nav>
        <ul>
          <li>Te has conectado correctamente.</li>
          <li><a href="../logout.php">Cerrar sesion	</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section id="boletin">
    <div class="contenedor">

    </div>
  	</section>
 	<div class="primer">
  		<div class = "second">
        <br>
  			<p>Para procesos metabólicos las células llevan a cabo
  			una interminable lucha por la supervivencia, en dicha
  			lucha se deja en claro quien obtiene más energía para
  			la correcta ejecución de sintetización del nutrientes.
  			No todas son aptas.</p>
  			<div class = "second_image">

  			</div>
  		</div>
  	</div>
  	<section id="boletin">
    <div class="contenedor">

    </div>
  	</section>
  <div class = "imagen_primer">
  	<div class = "primer">
  		<div class = "second">
  			<p> ¿Podrás sobreponerte ante las dificultades?
  			¿O serás condenada a la absoluta descomposición para
  			el aprovechameinto de otras células?</p>

  			<p>"[...] Aquellos menos aptos morirán, los mejor adaptados
  			sobreviven, la vida es una lucha constante por la
  			existencia... Natura non facit vita"</p>
  												<p>- Charles Darwin.</p>
  			<div class = "second_image2">

  			</div>
  		</div>
  	</div>
  </div>
  <div class="botoncentrao">
    <form  action="juego.php" method="post">
      <input type="submit" name="Siguiente" class="boton_personalizado"value="Siguiente">
    </form>

  </div>

  <footer class="center">
    <p>DonsInc | 2018</p>
  </footer>
</body>
</html>
