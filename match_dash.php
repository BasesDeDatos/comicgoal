	<?php require_once("header.php"); ?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	
	<div id="main" class="clearfix">
		<div id="container">
			<div id="content" role="main">
				<div class="col-md-12">
					<h1>
						Torneos
					</h1>
				<div>
				<div class="col-md-12">
					<div class = "acordion col-md-12">
						<?php $query = "call get_partido(null)";   
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { 
							$evento = $row["evento"];
							$all_matches[$evento][] = array(
								"ID_partido" => $row["ID_partido"],
								"nombre" => $row["fecha"]." / ".$row["resumen"]
							);
						} $mysqli->next_result();
						if(!empty($all_matches)){
							foreach($all_matches as $evento => $partidos){ ?>
								<h1 class ="texto"><?php echo $evento?></h1>
								<ul>
									<?php 
									foreach($partidos as $partido){ ?>
											<li class="col-md-12">
												<a href="match.php?partido=<?php echo $partido["ID_partido"] ?>">
													<?php echo $partido["nombre"] ?>
												</a>
											</li>
									<?php } ?>
								</ul> 
								<?php
							}
						} else{ ?>
							<label class="col-md-12">No hay torneos registrados todavía</label>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php require_once("footer.php");?>