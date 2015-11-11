	<?php require_once("header.php"); ?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	
	<div id="main" class="clearfix">
		<div id="container">
			<div id="content" role="main">
				<ul class="col-md-12 scroll-container">
					<?php $query = 'call get_equipo(null)';
						$result = $mysqli->query($query);
						while ($row = $result->fetch_assoc()) { ?> 
							<div class="col-md-4">
								<a href="team.php?equipo=<?php echo $row["ID_equipo"] ?>">
									<h2 class="team-item">
										<img class="max-50" src="img/country-flags-hi/<?php echo strtolower($row["iso2"]) ?>.png"> 
										<?php echo $row["nombre"] ?>
									</h2>
								</a>
							</div>						
					<?php } $mysqli->next_result(); ?>
				</u1>
			</div>
		</div>
	</div>
	
	<?php require_once("footer.php");?>