	<?php require_once("header.php"); ?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">

	<div id="main">
		<div id="container" class="">
			<div id="content" role="main">
				<ul class="home-widgets">
					<div class="sp-widget-align-none">
						<h1>Clasificaci&oacute;n</h1>
						<li id="sportspress-league-table-2" class="widget-container widget_league_table widget_sp_league_table tabla acordion">
							<?php $query = 'call get_tabla_estadistica(null)';
								$result = $mysqli->query($query);
								$pos = 1;
								while ($row = $result->fetch_assoc()) {
									$eventos[$row["evento"]][] = $row;
								} foreach ($eventos as $evento => $rows) { ?>
									<h3 class="widget-title">Tabla de posiciones <?php echo $evento ?></h3>
									<section>
										<div class="sp-template sp-template-league-table col-md-12">
											<div class="sp-table-wrapper">
												<div class="dataTables_wrapper no-footer" id="DataTables_Table_0_wrapper">
													<div class="sp-scrollable-table-wrapper">
														<table role="grid" id="DataTables_Table_0" class="sp-league-table sp-data-table sp-sortable-table sp-scrollable-table sp-paginated-table dataTable no-footer" data-sp-rows="-1">
															<thead>
																<tr role="row">
																	<th aria-label="Pos" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-rank sorting">Pos</th>
																	<th aria-label="Equipo" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-name sorting">Equipo</th>
																	<th aria-label="JJ" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-p sorting">JJ</th>
																	<th aria-label="JG" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-w sorting">JG</th>
																	<th aria-label="JE" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-d sorting">JE</th>
																	<th aria-label="JP" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-l sorting">JP</th>
																	<th aria-label="GF" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-f sorting">GF</th>
																	<th aria-label="GC" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-a sorting">GC</th>
																	<th aria-label="DIF" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-gd sorting">DIF</th>
																	<th aria-label="PTS" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-pts sorting">PTS</th>
																	<th aria-label="GRUPO" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" class="data-name sorting">GRUPO</th>
																</tr>
															</thead>
															<tbody><?php
																$pos = 1;
																foreach($rows as $row){ ?> 
																	<tr role="row" class="highlighte <?php echo $pos%2 == 0? "odd" : "even" ?> wow fadeInUp" data-wow-duration="2s" data-wow-delay="<?php echo $pos*2?>">
																		<td class="data-rank sp-highlight wow zoomIn" data-wow-duration="2s" data-wow-delay="<?php echo $pos+1*2?>"><?php echo $pos++ ?></td>
																		<td class="data-name has-logo sp-highlight wow zoomIn" data-wow-duration="2s" data-wow-delay="<?php echo $pos*2+1?>">
																			<span class="team-logo">
																				<img src="img/country-flags/<?php echo $row["iso"] ?>.png" 
																					class="attachment-sportspress-fit-icon wp-post-image" 
																					alt="eagles" 
																					height="128" 
																					width="105">
																			</span>
																			<?php echo $row["nombre"] ?>
																		</td>
																		<td class="data-p sp-highlight"><?php echo $row["jj"] ?></td>
																		<td class="data-w sp-highlight"><?php echo $row["jg"] ?></td>
																		<td class="data-d sp-highlight"><?php echo $row["je"] ?></td>
																		<td class="data-l sp-highlight"><?php echo $row["jp"] ?></td>
																		<td class="data-f sp-highlight"><?php echo $row["gf"] ?></td>
																		<td class="data-a sp-highlight"><?php echo $row["gc"] ?></td>
																		<td class="data-gd sp-highlight"><?php echo $row["diff"] ?></td>
																		<td class="data-pts sp-highlight"><?php echo $row["pts"] ?></td>
																		<td class="data-name sp-highlight"><?php echo $row["grupo"] ?></td>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<a class="sp-league-table-link sp-view-all-link" href="match_dash.php">Ver todos los partidos</a>
										</div>
									</section> <?php 
								} $mysqli->next_result(); ?> 
								
							
							
								
						</li>
					</div>
				</ul>
			</div>
			<!-- #content -->
		</div>
		<!-- #container -->
	</div>
	<!-- #main -->
		
		
	<?php require_once("footer.php");?>