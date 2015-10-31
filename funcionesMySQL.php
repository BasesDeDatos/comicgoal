
<!--
Author: Isaac Campos, Roger Villalobos,  Jeffrey Alvarado
Author URL: 
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
//	header('Content-Type: text/html; charset=ISO-8859-1');
	$user = 'MatchMe';
	$clave = 'MatchMe';
	$db = '(DESCRIPTION = (ADDRESS_LIST =
	  (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
	 )
	 (CONNECT_DATA =
	  (SID = dbprojets)
	  (SERVER = DEDICATED)
	 )
	)';

	$conexion = mysql_connect("localhost", "caco26i", "");

	mysql_select_db("c9", $conexion) OR DIE (
		"Error: No es posible establecer la conexión"
	);

// Realizar una consulta MySQL
$query = 'SELECT * FROM pais';   ////EJEMPLO DE COMO HACER UNA CONSULTA
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


// Imprimir los resultados en HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);

	// if (!$conexion) {
	// 	echo "Error de conexion: ".var_dump(OCIError());
	// 	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	// 	die();
	// }
	
	
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