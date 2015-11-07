<?php

	require("conexionMySQL.php");
		
	$fp = fopen("./log/log.log", "a");
	
	date_default_timezone_set("America/Costa_Rica");
	fwrite($fp, PHP_EOL);
	fwrite($fp, DATE("d/M/y  H:i:s") . PHP_EOL);

	
	fwrite($fp, implode("\t", $_POST) . PHP_EOL);

	if (!empty($_POST) && $_POST["mode"] == "login"){
		session_start();
		
		$mysqli->next_result();
 		$query = "select get_usuario('{$Email}', '{$Clave}')";
 		fwrite($fp, $query . PHP_EOL);
 		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	        ?>
	        	<script>alert("Email o contraseña incorrecta");</script>
	        <?php
	    } else {
	    	$row = $result->fetch_row();
	    	fwrite($fp, "ID:" . $row[0] . PHP_EOL);
	    	$response["success"] = true;
	    	$response["ID"] = $row[0];
	    	$_SESSION["active_user_id"] = $row[0];

	    	?>
				<script>window.location="index.php";</script>
			<?php
	    }
	}
	
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_catalogo"){
	    $mysqli->next_result();
 		$query = "select ".$_POST["procedure"]."('".htmlentities($_POST['value'], ENT_QUOTES, "UTF-8")."')";
 		fwrite($fp, $query . PHP_EOL);
 		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$row = $result->fetch_row();
	    	fwrite($fp, "ID:" . $row[0] . PHP_EOL);
	    	$response["success"] = true;
	    	$response["ID"] = $row[0];
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "editar_catalogo"){
		$mysqli->next_result();
 		$query = "call ".$_POST["procedure"]."('".htmlentities($_POST['value'], ENT_QUOTES, "UTF-8")."', {$_POST['row_id']})";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "borrar_catalogo"){
		$mysqli->next_result();
		$query = "call ".$_POST["procedure"]."({$_POST['row_id']})";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_partido"){
		$mysqli->next_result();
		$query = "select registrar_partido(STR_TO_DATE('{$_POST['fecha']}', '%Y-%m-%d'), 
										   STR_TO_DATE('{$_POST['hora']}', '%h:%i'), 
										   {$_POST['equipo_local']}, 
										   {$_POST['equipo_visita']}, 
										   {$_POST['estadio']}, 
										   {$_POST['evento']})";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_equipo"){
		$mysqli->next_result();
		$query = "select registrar_equipo('{$_POST['escudo']}', 
										   {$_POST['confederacion']}, 
										   {$_POST['continente']}, 
										   {$_POST['pais']})";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_integrante"){
		$mysqli->next_result();
		$query = "select registrar_integrante(STR_TO_DATE('{$_POST['fecha_nac']}', '%Y-%m-%d'), 
										   	  '{$_POST['foto']}', 
										      {$_POST['equipo']}, 
										      {$_POST['nacionalidad']},
										      {$_POST['posicion']},
										      '{$_POST['nombre']}',
										      {$_POST['numero']},
										      '{$_POST['primer_apellido']}',
										      '{$_POST['segundo_apellido']}')";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_equipoXevento"){
	
		for ($i = 0; $i < count($_POST['equipos']); $i++){
			$mysqli->next_result();
			$query = "select registrar_equipoXevento({$_POST['equipos'][$i]}, 
											   		{$_POST['evento']}),
											   		{$_POST['grupo']})";
			fwrite($fp, $query . PHP_EOL);
			$result = $mysqli->query($query);
		
			if (!$result) {
				$error = $mysqli->error;
		        fwrite($fp, "Error: " . $error . PHP_EOL);
		        $response["success"] = false;
		        $response["error"] = $error;
		    } else {
		    	$response["success"] = true;
		    }
		    
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($response, JSON_FORCE_OBJECT);
		}
	}
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_estadisticaXpartido"){
		$mysqli->next_result();
		$query = "select registrar_estadisticaXpartido({$_POST['integrante']}, 
										  				{$_POST['partido']}, 
										  				{$_POST['estadistica']}, 
										  				{$_POST['minuto']})";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_usuario"){
		$mysqli->next_result();
		$query = "select registrar_usuario('{$_POST['email']}', 
										   '{$_POST['password']}')";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_premioXequipo"){
		$mysqli->next_result();
		$query = "select registrar_premioXequipo({$_POST['equipo']}, 
										   		 {$_POST['premio']}
										   		 {$_POST['cantidad']}
										   		 )";
 		fwrite($fp, $query . PHP_EOL);
		
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    }
	    
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	fwrite($fp, "--------------------------------------------------------------");
	fclose($fp);
	
	require("desconexionMySQL.php");
?>