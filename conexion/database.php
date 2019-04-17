<?php
//Iniciamos con la conexion
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'donsweb';
$conect=mysql_connect($server,$username,$password);
if(!$conect){
	echo "No se puede conectar con el servidor";
}else{
		$base=mysql_select_db($database);
		if(!$base){
			echo "No se encontro la base de datos";
		}
}
?>
