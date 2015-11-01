
<!--
Author: Isaac Campos, Roger Villalobos,  Jeffrey Alvarado
Author URL: 
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
//	header('Content-Type: text/html; charset=ISO-8859-1');
	include_once("conexionMySQL.php");


	// Realizar una consulta MySQL
	$query = 'call get_pais(1)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	// Imprimir los resultados en HTML
	echo "<table>\n";
	$array_datos = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($row as $col_name => $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	        $array_datos[$col_name][] = $col_value;
	    }
	    echo "\t</tr>\n";
	}
	echo "</table>\n";
	var_dump($array_datos);
	
	
	$result->close();
    $conexion->next_result();
    
	// Realizar una consulta MySQL
	$query = 'call get_pais(1)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	// Imprimir los resultados en HTML
	echo "<table>\n";
	$array_datos = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($row as $col_name => $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	        $array_datos[$col_name][] = $col_value;
	    }
	    echo "\t</tr>\n";
	}
	echo "</table>\n";
	var_dump($array_datos);
	

	include_once("desconexionMySQL.php");

	
	if (!empty($_POST) && $_POST["mode"] == "loggin"){
		session_start();
		$Email = $_POST["Email"];
		$Clave = $_POST["Clave"];
		$valueFunction = queryFunction($conexion, "begin :value := get_userID('{$Clave}','{$Email}'); end;");
		$_SESSION["active_user_id"] = $valueFunction;
		if ($valueFunction != -1 ){?>
			<script>window.location="index.php";</script>	
		<?php }
		else{?>
			<script>alert("Email o contraseña incorrecta");</script>
		<?php }
	}
	
?>