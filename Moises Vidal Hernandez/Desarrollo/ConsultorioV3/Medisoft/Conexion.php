<?php  
	$mysqli = new mysqli('localhost', 'root', 'password','medisoft');
	if ($mysqli->connect_error) 
	{
		die('Error en la conexion'. $mysqli->connect_error);
	}
?>