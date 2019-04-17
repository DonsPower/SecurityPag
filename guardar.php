<?php
  require 'conexion/database.php';
  //recuperamos las variables
  $nombre= mysql_real_escape_string($_POST['name']);
  $username=mysql_real_escape_string($_POST['first']);
  $email=mysql_real_escape_string($_POST['email']);
  $password=mysql_real_escape_string($_POST['password']);



  //Ya que tenemos esto hacemos la conexion con la base de datos.
  $sql="INSERT INTO usuario VALUES(null,'$nombre','$username','$email',SHA('$password'))";
  //Ejecutamos la consulta.
  $ejecutar=mysql_query($sql);
    echo $sql;
    //verificamos que se haya ejecutado bien.
    if(!$ejecutar){
      echo "Hubo algun error";
    }else{
      echo "Datos Guardados correctamente.";

    }



 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>prueba</title>
   </head>
   <body>
     <h1>hola</h1>


   </body>
 </html>
