<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'donsweb';

	try
	{
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	}
	catch(PDOException $e)
	{
		die('Connection failed: '.$e->getMessage());
	}
?>
