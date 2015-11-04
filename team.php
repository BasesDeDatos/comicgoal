	<?php require_once("header.php"); 
	//	$arrayQuery = array(); 
	//	$_POST["mode"] = "get_home"; 
	//	$user_id = $_SESSION["active_user_id"];
	//	include ("funcionesOracle.php");
	?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	
	<!--div id="main" class="col-md-12 scroll-container">
		<?php $query = 'call get_integrante(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
			$result = $mysqli->query($query);
			// Imprimir los resultados en HTML
			while ($row = $result->fetch_assoc()) { ?> 
				<div class="col-md-4">
					<a href="player.php"><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"]." - ".$row["posicion"]?></a>
				</div>						
		<?php } $mysqli->next_result(); ?>
	</div-->
	
	<div class = "acordion">
		<h1 class ="texto">Porteros</h1>
		<?php $query = 'call get_integrante(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) { ?> 
				<a href="player.php"><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?></a>
		<?php } $mysqli->next_result(); ?>
	</div>
	
	<div class = "acordion">
		<h1 class ="texto">Defensas</h1>
		<?php $query = 'call get_integrante(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) { ?> 
				<a href="player.php"><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?></a>
		<?php } $mysqli->next_result(); ?>
	</div>
	
	<div class = "acordion">
		<h1 class ="texto">Delanteros</h1>
		<?php $query = 'call get_integrante(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) { ?> 
				<a href="player.php"><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?></a>
		<?php } $mysqli->next_result(); ?>
	</div>
	
	<div class = "acordion">
		<h1 class ="texto">Entrenadores</h1>
		<?php $query = 'call get_integrante(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) { ?> 
				<a href="player.php"><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?></a>
		<?php } $mysqli->next_result(); ?>
	</div>
	
	<?php require_once("footer.php");?>