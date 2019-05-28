<?php
  	session_start();
  	require '../conexion/database2.php';
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

  <?php
  $aloja= $user['user'];
    //echo $aloja;
    require '../conexion/database.php';
    $message = '';
    //Verificamos que los campos no esten vacios.
  if (!empty($_POST['nom_materia']) && !empty($_POST['fecha_entrega']) && !empty($_POST['envio_tarea'])) {
    $nomTarea= mysql_real_escape_string($_POST['nom_materia']);
    $fechaEnt=mysql_real_escape_string($_POST['fecha_entrega']);
    $envioTarea=mysql_real_escape_string($_POST['envio_tarea']);
    //SHA(
     $sql="INSERT INTO homework VALUES(null,'$aloja','$nomTarea','$fechaEnt','$envioTarea')";
    $ejecutar=mysql_query($sql);
       //Condicion de si se creo o no el usuario.
       if(!$ejecutar){
         $message = 'Intente nuevamente problemas al guardar tarea.';
       }else{
           $message = 'Tarea guardada correctamente';
       }
    }


  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>MetaWars | Test</title>
    <meta charset="utf-8">
    <!--Apartado para los CSS-->
      <link rel="stylesheet" href="../css/main.css">
      <link rel="stylesheet" href="../css/pagInicio.css">
      <link rel="stylesheet" href="../css/boton.css">
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
    <div class="eresProfe">
      <form class="" action="../intropage.php" method="post">
        <button   type="submit" class="id" >
          <p>Regresar</p>
          <br>

        </button>
      </form>

    </div>
    <div class="cuadroTarea">
        <h2>Apuntar Tarea</h2>
    </div>
    <div class="preguntas">
      <div class="cuadrotexto">
        <?php if(!empty($message)): ?>
          <div class="errorRojo">
             <p align="center"> <?= $message ?></p>
          </div>
       <?php endif; ?>
      <form class="" action="test.php" method="post">
        <br>
        <h3>Escribe el nombre de la materia.</h3>
        <br>
        <input type="text" name="nom_materia" style="font-size:20px;"maxlength="35" >
        <br><br>
        </div>
        <h3>Escriba la fecha de entraga</h3>
        <br>
        <input type="date" name="fecha_entrega" style="font-size:20px; text-align:center;" >
          <h3>Escriba la tarea</h3>
        <br>
        <input type="text" name="envio_tarea" style="WIDTH: 428px; HEIGHT: 70px" >
        <br><br>

        <input type="submit" class="boton_personalizado" name="envio" value="Enviar">
        <input type="reset" class="boton_personalizado" name="" value="Borrar">

      </form>
  </div>

    <footer class="center">
      <p>DonsInc | 2018</p>
    </footer>
  </body>
</html>
