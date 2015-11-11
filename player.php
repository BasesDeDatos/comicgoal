	<?php require_once("header.php"); 
		$user_id = $_SESSION["active_user_id"];
	?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	
	<?php $ID_integrante = $_GET["integrante"];
		$query = "call get_integrante({$ID_integrante}, null)"; 
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
	?>
	
	<div class ="container-fluid" id = "contenedor" >
		<div class="row" > 
			<div class= "col-md-6 columnaUno">
				<div class="col-md-12">
						<div class="cntnt-img">
						</div>
						<div class="bnr-img">
							<img src= <?php echo "img/".$row["foto"] ?> alt=""/>
						</div>
						<div class="bnr-text">
							<h1>
								<?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"];	?>
							</h1>
							<hr/>
						</div>
				</div>
			</div>

			<div class= "col-md-6">
				<div id="tap" class="col-md-12">
					<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
					<label for="tab-1" class="tab-label-1">Información del jugador</label>
				   
					<div class="content">
						<div class="content-1">
								<p><label class ="texto">Posición: <?php echo $row["posicion"] ?></label></p>
								<p><label class ="texto">Fecha de nacimiento: <?php echo $row["fecha_nac"] ?></label></p>
								<p><label class ="texto">Edad: <?php echo $row["edad"]." años" ?></label></p>
								<p><label class ="texto">Nacionalidad: <?php echo $row["pais"] ?></label></p>
								<p><label class ="texto">Número de camiseta: <?php echo $row["num_camiseta"] ?></label></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<?php require_once("footer.php");?>
