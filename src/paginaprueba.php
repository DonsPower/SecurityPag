
<?php
  	session_start();
    $message = '';
  	require '../conexion/database2.php';
  	if (isset($_SESSION['username']))
  	{
    //	$records = $conn->prepare('SELECT * FROM nombre_tabla WHERE no_boleta = :boleta');
    //	$records->bindParam(':boleta', $_SESSION['no_boleta']);
      $records = $conn->prepare('SELECT * FROM usuario WHERE user = :users');
      $records->bindParam(':users', $_SESSION['username']);
      $message = $_SESSION['username'];
    	$records->execute();
    	$results = $records->fetch(PDO::FETCH_ASSOC);
    	$user = null;
      		$user = $results;

  	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagina prueba</title>
    <!--Apartado para los CSS-->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/pagInicio.css">
  </head>
  <body>
    <?php if(!empty($user)): ?>
          <header>
      <div class="contenedor">
        <div id="marca">
          <h1><span class="resaltado">Usuario: </span><?= $user['user']; ?></h1>
        </div>
        <nav>
          <ul>
            <li>Te has conectado correctamente.</li>
            <li><a href="logout.php">Cerrar sesion	</a></li>

          </ul>
        </nav>
      </div>
    </header>
    <h1>hola gooogle</h1>

    <form class="" action="paginaprueba.php" method="post">
        <input type="text" name="name2" value="">
        <input type="submit" name="sunbit" value="">
    </form>
    <?php
      require '../conexion/database.php';
      $message2='';
      //Verificamos que los campos no esten vacios.
    if (!empty($_POST['name2'])) {
      $nombre= mysql_real_escape_string($_POST['name2']);
      //SHA(
        $sql="INSERT INTO prueba VALUES(null,'$nombre')";
          $ejecutar=mysql_query($sql);
         //Condicion de si se creo o no el usuario.
         if(!$ejecutar){
           $message2 = 'Sorry there must have been an issue creating your account';
         }else{

             $message2 = 'Successfully created new user';
         }
      }
     ?>
     <?php if(!empty($message2)): ?>
       <div class="errorRojo">
          <p align="center"> <?= $message2 ?></p>
       </div>
    <?php endif; ?>
  <?php else: ?>
    <h1>ERROR</h1><li><a href="logout.php">Cerrar sesion	</a></li>

<?php endif; ?>
  </body>
</html>
