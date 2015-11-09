<?php

	require("conexionMySQL.php");
		
	$fp = fopen("./log/log.log", "a");
	
	date_default_timezone_set("America/Costa_Rica");
	fwrite($fp, PHP_EOL);
	fwrite($fp, DATE("d/M/y  H:i:s") . PHP_EOL);

	
	fwrite($fp, implode("\t", $_POST) . PHP_EOL);

	// foreach($_POST as $key => $value){ // SE CONVIERTEN LOS CARACTERES ESPECIALES EN ENTIDADES HTML
	// 	$_POST[$key] = htmlentities($value, ENT_QUOTES, "UTF-8");
	// }
	
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
 		$query = "select ".$_POST["procedure"]."('".$_POST['value']."')";
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
	
	if (!empty($_POST) && $_POST["mode"] == "editar_partido"){
		$mysqli->next_result();
		$query = "call editar_partido(STR_TO_DATE('{$_POST['fecha']}', '%Y-%m-%d'), 
										   STR_TO_DATE('{$_POST['hora']}', '%h:%i'), 
										   {$_POST['equipo_local']}, 
										   {$_POST['equipo_visita']}, 
										   {$_POST['estadio']}, 
										   {$_POST['evento']},
										   {$_POST['ID_partido']})";
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
		$escudo = $_POST['escudo'];
		if ($escudo == ''){
			$escudo = "team_default.jpg";
		}
		$query = "select registrar_equipo('$escudo', 
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
	
	if (!empty($_POST) && $_POST["mode"] == "editar_equipo"){
		$mysqli->next_result();
		$escudo = $_POST['escudo'];
		if ($escudo == ''){
			$escudo = "team_default.jpg";
		}
		$query = "call editar_equipo('{$escudo}', 
										   {$_POST['confederacion']}, 
										   {$_POST['continente']}, 
										   {$_POST['pais']},
										   {$_POST['ID_equipo']})";
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
		$foto = $_POST['foto'];
		if ($foto == ''){
			$foto = "player_default.jpg";
		}
		$query = "select registrar_integrante(STR_TO_DATE('{$_POST['fecha_nac']}', '%Y-%m-%d'), 
										   	  '{$foto}', 
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
	
	if (!empty($_POST) && $_POST["mode"] == "editar_integrante"){
		$mysqli->next_result();
		$foto = $_POST['foto'];
		if ($foto == ''){
			$foto = "player_default.jpg";
		}
		$query = "call  editar_integrante(STR_TO_DATE('{$_POST['fecha_nac']}', '%Y-%m-%d'), 
										   	  '{$foto}', 
										      {$_POST['equipo']}, 
										      {$_POST['nacionalidad']},
										      {$_POST['posicion']},
										      '{$_POST['nombre']}',
										      {$_POST['numero']},
										      '{$_POST['primer_apellido']}',
										      '{$_POST['segundo_apellido']}',
										      {$_POST['ID_integrante']})";
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
	
	if (!empty($_POST) && $_POST["mode"] == "registrar_integranteXpartido"){
		
		$integrantes = array_merge ($_POST['integrantes_local'], $_POST['integrantes_visita']);
		
		if (!empty($integrantes)){
			for ($i = 0; $i < count($integrantes); $i++){
				$mysqli->next_result();
				$query = "select registrar_integranteXpartido({$integrantes[$i]}, 
												   			  {$_POST['partido']})";
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
	
	if (!empty($_POST) && $_POST["mode"] == "editar_estadisticaXpartido"){
		$mysqli->next_result();
		$query = "call  editar_estadisticaXpartido({$_POST['integrante']}, 
										  				{$_POST['partido']}, 
										  				{$_POST['estadistica']}, 
										  				{$_POST['minuto']}),
										  				{$_POST['ID_estadisticaXpartido']})";
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
		$password = md5($_POST['password']);
		$query = "select registrar_usuario('{$_POST['email']}', 
										   '$password')";
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
	
	if (!empty($_POST) && $_POST["mode"] == "editar_usuario"){
		$mysqli->next_result();
		$password = md5($_POST['password']);
		$query = "call  editar_usuario('{$_POST['email']}', 
										   '$password',
										   {$_POST['ID_usuario']})";
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
	
	if (!empty($_POST) && $_POST["mode"] == "editar_premioXequipo"){
		$mysqli->next_result();
		$query = "call  editar_premioXequipo('{$_POST['ID_premioXequipo']}', 
										   {$_POST['cantidad']})";
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
										   		 {$_POST['premio']},
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
	
	if (!empty($_POST) && $_POST["mode"] == "callProcedure"){
		$mysqli->next_result();
		if (key_exists("param3", $_POST)){
			$query = "call {$_POST['procedure']}({$_POST['param1']}, {$_POST['param2']}, {$_POST['param3']})";
		} else if (key_exists("param2", $_POST)){
			$query = "call {$_POST['procedure']}({$_POST['param1']}, {$_POST['param2']})";
		} else if (key_exists("param1", $_POST)){
			$query = "call {$_POST['procedure']}({$_POST['param1']})";
		}
		
 		fwrite($fp, $query . PHP_EOL);
		$result = $mysqli->query($query);
		
		if (!$result) {
			$error = $mysqli->error;
	        fwrite($fp, "Error: " . $error . PHP_EOL);
	        $response["success"] = false;
	        $response["error"] = $error;
	    } else {
	    	$response["success"] = true;
	    	while ($row = $result->fetch_assoc()) {
				$response["data"][] = $row; 
			}
	    }
					
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($response, JSON_FORCE_OBJECT);
	}
	
	fwrite($fp, "--------------------------------------------------------------");
	fclose($fp);
	
	require("desconexionMySQL.php");
?>