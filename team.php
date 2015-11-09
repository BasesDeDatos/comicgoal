	<?php require_once("header.php"); 
	//	$arrayQuery = array(); 
	//	$_POST["mode"] = "get_home"; 
	//	$user_id = $_SESSION["active_user_id"];
	//	include ("funcionesOracle.php");
	
	
	if (key_exists("equipo", $_GET)){
	
		$ID_equipo = $_GET["equipo"];
		
		?>
		
		<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
		
		<?php $query = "call get_equipo({$ID_equipo})"; 
			  $result = $mysqli->query($query);
			  $row = $result->fetch_assoc();
		?>
		<div class="row" > 
			<div class="col-md-4">
				<div class="content-right">
					<div class="cntnt-img">
					</div>
					<div class="bnr-img">
						<img src= <?php echo "img/".$row["escudo_equipo"] ?> alt=""/>
					</div>
					<div class="bnr-text">
						<h1>
							<img src="img/country-flags/<?php echo $row["iso2"]?>.png"> <?php echo $row["nombre"]?>
						</h1>
						<p>
							Continente: <?php echo $row["continente"]?>
						</p>
						<p>
							Confederación: <?php echo $row["confederacion"]?>
						</p>
						<hr/>
					</div>
				</div>
			</div>
			
			<?php $mysqli->next_result(); ?>
			
			
			<?php $query = "call get_integrante(null, {$ID_equipo})";   
				$result = $mysqli->query($query);
				// Imprimir los resultados en HTML
				while ($row = $result->fetch_assoc()) { 
					$posicion = $row["posicion"];
					$team[$posicion][] = array(
						"ID_integrante" => $row["ID_integrante"],
						"nombre" => $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"],
					);
				} $mysqli->next_result(); 
			?>
			
			<div class = "col-md-8">
				<h3>
					Jugadores
				</h3>
			</div>
				
			<div class = "acordion col-md-8">
				<?php 
					if(!empty($team)){
						foreach($team as $posicion => $integrantes){ ?>
							<h1 class ="texto"><?php echo $posicion."s" ?></h1>
							<?php 
							foreach($integrantes as $integrante){ ?>
								<a href="player.php?integrante=<?php echo $integrante["ID_integrante"] ?>"><?php echo $integrante["nombre"] ?></a>
							<?php }
						}
					}
					else{ ?>
						<label class="col-md-12">Este equipo no tiene jugadores todavía</label>
					<?php } ?>
			</div>
		
			<?php } else{	?>
				<p>
					<h1 class="col-md-12">Esta página no existe!</h1>
				</p>
				<hr/>
			<?php }	?>
			
			<?php $query = "call get_premioXequipo(null, {$ID_equipo})";   
				$result = $mysqli->query($query);
				if($result->num_rows != 0) {?>
					<div class = "col-md-8">
						<h3>
							Títulos
						</h3>
							<?php while ($row = $result->fetch_assoc()) { ?> 
							<p>
								<?php echo $row["premio"]?>: <?php echo $row["cantidad"]?>
							</p>
						<?php } $mysqli->next_result();?>
					</div>
				<?php } ?>
		</div>
	
	<?php require_once("footer.php");?>