<?php

	require("conexionMySQL.php");
		
	$fp = fopen("./log/log.log", "a");
	
	date_default_timezone_set("America/Costa_Rica");
	fwrite($fp, PHP_EOL);
	fwrite($fp, DATE("d/M/y  H:i:s") . PHP_EOL);

	
	fwrite($fp, implode("\t", $_POST) . PHP_EOL);

	
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
	
	fwrite($fp, "--------------------------------------------------------------");
	fclose($fp);
	
	require("desconexionMySQL.php");
?>