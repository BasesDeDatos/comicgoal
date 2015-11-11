	<?php require_once("header.php"); 
		$user_id = $_SESSION["active_user_id"];
	?>
		
		<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
		
		<div id="main" class="clearfix">
			<div id="container" class="col-md-12">
				<div id="content" role="main">
					<ul class="home-widgets">
						<li id="sportspress-event-blocks-3" class="widget-container widget_sp_event_blocks">
							<h3 class="widget-title">Resumen del partido</h3>
							<div class="sp-template sp-template-event-blocks">
								<div class="sp-table-wrapper">
									<table class="sp-event-blocks sp-data-table sp-paginated-table" data-sp-rows="10">
										<tbody>
											<?php $ID_partido = $_GET["partido"];
												$query = "call get_partido({$ID_partido})";   ////EJEMPLO DE COMO HACER UNA CONSULTA
												$result = $mysqli->query($query);
												$row = $result->fetch_assoc();
												$equipo_local = $row["ID_equipo_local"];
												$equipo_visita = $row["ID_equipo_visita"];
											?>
											<td>
												<a href=team.php?equipo=<?php echo $row["ID_equipo_local"]?>>
												<img src="img/country-flags-hi/<?php echo strtolower($row["iso_local"])?>.png" 
													class="team-logo logo-odd wp-post-image" 
													alt="<?php echo $row["iso_local"]?>" height="128" width="113"> 
												</a>
												<a href=team.php?equipo=<?php echo $row["ID_equipo_visita"]?>>
												<img src="img/country-flags-hi/<?php echo strtolower($row["iso_visita"])?>.png" 
													class="team-logo logo-even wp-post-image" 
													alt="<?php echo $row["iso_visita"]?>" height="128" width="105">
												</a>
												<time class="sp-event-date" datetime="<?php echo $row["fecha"]." ".$row["hora"] ?>"><?php echo $row["fecha"] ?></time>
												<h5 class="sp-event-results"><?php echo $row["goles_local"] . " - " . $row["goles_visita"] ?></h5>
												<p class="sp-event-title"><?php echo $row["estadio"] ?></p>														</h4>
												<h4 class="sp-event-title">
													<label><?php echo $row["equipo_local"]." vs ".$row["equipo_visita"] ?></label>
												</h4>
											</td>
										</tbody>
									</table>
								</div>
							</div>
						</li>
					</ul>
					<div class= "col-md-12">
						<div id="tap" class="col-md-12">
							<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
							<label for="tab-1" class="tab-label-1">Estadísticas</label>
							<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
						   	<label for="tab-2" class="tab-label-2">Alineación</label>
						   	<input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
						   	<label for="tab-3" class="tab-label-2">Comentarios</label>
							
							<div class="content">
								<div class="content-1">
									<div class="col-md-12">
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["tarjetas_rojas_local"] ?></h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats">Tarjetas rojas</h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["tarjetas_rojas_visita"] ?></h3>
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["tarjetas_amarillas_local"] ?></h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats">Tarjetas amarillas</h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["tarjetas_amarillas_visita"] ?></h3>
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["fuera_de_juego_local"] ?></h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats">Fueras de juego</h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["fuera_de_juego_visita"] ?></h3>
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["parada_local"] ?></h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats">Paradas</h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["parada_visita"] ?></h3>
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["tiro_local"] ?></h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats">Tiros</h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["tiro_visita"] ?></h3>
										</div>
									</div>
									<div class="col-md-12">
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["falta_local"] ?></h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats">Faltas</h3>
										</div>
										<div class="col-md-4">
											<h3 class ="stats"><?php echo $row["falta_visita"] ?></h3>
										</div>
									</div>
								</div>
								<div class="content-2">
									<div class="col-md-6"><h2>Equipo local</h2></div>
									<div class="col-md-6"><h2>Equipo visitante</h2></div>
									<div class="col-md-6 scroll-container">
										<?php $mysqli->next_result();
											$query = "call get_integranteXpartido({$ID_partido}, {$equipo_local})";
											$result = $mysqli->query($query);
											if ($result->num_rows != 0) {
												while ($row = $result->fetch_assoc()) { ?>
													<div class="col-md-12">
														<label>
															<a href="player.php?integrante=<?php echo $row["ID_integrante"] ?>">
																<?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?>
															</a>
														</label>
													</div>
											<?php }
											} else{  ?>
												<label>Este equipo no tiene jugadores alineados</label>
											<?php }
											$mysqli->next_result(); ?>
									</div>
									<div class="col-md-6 scroll-container">
										<?php $query = "call get_integranteXpartido({$ID_partido}, {$equipo_visita})";
											$result = $mysqli->query($query);
											if ($result->num_rows != 0){
												while ($row = $result->fetch_assoc()) { ?> 
													<div class="col-md-12">
														<label>
															<a href="player.php?integrante=<?php echo $row["ID_integrante"] ?>">
																<?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?>
															</a>
														</label>
													</div>
											<?php }
											} else{  ?>
												<label>Este equipo no tiene jugadores alineados</label>
											<?php }
											$mysqli->next_result(); ?>
									</div>
								</div>
								<div class="content-3">
									<div class="col-md-12">
										<div class="col-md-12 scroll-container">
											<?php $query = "call get_estadisticaXpartido({$ID_partido})";
												$result = $mysqli->query($query);
												if ($result->num_rows != 0){
													while ($row = $result->fetch_assoc()) { ?> 
														<div class="col-md-12">
															<label>
																<?php echo $row["minuto"]." - ".$row["estadistica"]." - ".$row["integrante"] ?>
															</label>
														</div>
												<?php }
												} else{  ?>
													<label>Este partido no tiene ningun comentario todavia</label>
											<?php }
											$mysqli->next_result(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- #content -->
			</div>
			<!-- #container -->
		</div>
		<!-- #main -->
		
		
	<?php require_once("footer.php");?>