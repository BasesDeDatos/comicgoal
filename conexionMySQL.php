<!--
Author: Isaac Campos, Roger Villalobos,  Jeffrey Alvarado
Author URL: 
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
	$conexion = mysql_connect("localhost", "caco26i", "");
	mysql_select_db("c9", $conexion) OR DIE (
		"Error: No es posible establecer conexión con la base de datos, intentelo más tarde"
	);
?>