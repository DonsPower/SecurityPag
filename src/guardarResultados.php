<?php
ob_start();
  	session_start();
  	if (isset($_SESSION['boleta']))
  	{
      require 'src/database.php';
        $res=$_POST['fin'];
        echo $res;
        $boleta= $_POST['voleta'];
        $QueryConsulta="UPDATE `nombre_tabla` SET `resultados_iniciales` = '$res' WHERE `nombre_tabla`.`no_boleta` = '$boleta'";
        $conexion = mysqli_connect('localhost','id7954678_juan','donsispower') or die ;
     $elegir= mysqli_select_db($conexion,"id7954678_base_de_datos");
        $resultado= mysqli_query($conexion,$QueryConsulta);
    	header('Location:src/sesionIniciada.php');
  	}
    echo "<script> alert('hi1')</script>";
  	if (!empty($_POST['pass']) && !empty($_POST['boleta']))
  	{
    	$records = $conn->prepare('SELECT * FROM nombre_tabla WHERE no_boleta = :boleta');
    	$records->bindParam(':boleta', $_POST['boleta']);
    	$records->execute();
    	$results = $records->fetch(PDO::FETCH_ASSOC);
    	$message = '';
    	if (count($results) >0 && $results['columna_password']==$_POST['pass'] )
    	{
     		$_SESSION['boleta'] = $results['no_boleta'];
      		header("Location: src/sesionIniciada.php");
    	}
    	else
    	{
      		$message = 'Contraseña o usuario incorrectos';
          echo "<script>
                   alert('Contraseña o usuario incorrecto');
                   window.location= 'src/IniciarSesion.php'
                   </script>";
    	}
  	}
  	ob_end_flush();
?>
