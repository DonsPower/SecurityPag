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
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Resultado de Busqueda</title>
      <link rel="stylesheet" href="css/bootstra337.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Apartado para los CSS-->
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/pagInicio.css">
        <link rel="stylesheet" href="../css/boton.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <div class="container">
      <?php
      $local=$user['user'];
      $connection_mysql = mysqli_connect("localhost","root","","donsweb");

      if (mysqli_connect_errno($connection_mysql)){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $sql = "SELECT * FROM homework WHERE LOWER(nombre) LIKE '%$local%'";
      $result = mysqli_query($connection_mysql,$sql);
        $total = mysqli_num_rows($result);
        if($total > 0) {
          ?>
          <table class="table table-striped">
              <thead>
              <h3>Tareas pendientes</h3>
              <tr>
                  <th>Nombre de usuario</th>
                  <th>Nombre de la materia</th>
                  <th>Fecha de entrega</th>
                  <th>Apunte de la tarea.</th>
              </tr>
            <tr>
              </thead>
              <tbody>
              <?php
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo "$row[1]"; ?></td>
                  <td><?php echo "$row[2]"; ?></td>
                  <td><?php echo "$row[3]"; ?></td>
                  <td><?php echo "$row[4]"; ?></td>

                </tr>
              <?php
              }
              ?>
              </tbody>
          </table>
          <br>
          <br>
          <a href="../intropage.php" class="boton_personalizado" align="center" >Atras</a>
          <?php
        } else {

        ?>
        <h2>No se encuentra ninguna tarea activa.</h2>
        <h3>Porfavor ir a la parte de "almacenar tarea" para guardar una.</h3>
        <br><br><br>
        <a href="../intropage.php" class="boton_personalizado" align="center" >Atras</a>
        <?php
        }
         ?>
      </div>
  </body>
</html>
