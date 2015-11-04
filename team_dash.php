	<?php require_once("header.php"); 
	//	$arrayQuery = array(); 
	//	$_POST["mode"] = "get_home"; 
	//	$user_id = $_SESSION["active_user_id"];
	//	include ("funcionesOracle.php");
	?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	
	<div id="main" class="clearfix">
		<div id="container">
			<div id="content" role="main">
				<ul class="col-md-12 scroll-container">
					<?php $query = 'call get_equipo(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<div class="col-md-12">
								<a href="team.php"><?php echo $row["nombre"] ?></a>
							</div>						
					<?php } $mysqli->next_result(); ?>
				</u1>
			</div>
		</div>
	</div>
	<!-- #main -->
		
	<?php require_once("footer.php");?>