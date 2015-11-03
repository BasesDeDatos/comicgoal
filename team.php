	<?php require_once("header.php"); 
	//	$arrayQuery = array(); 
	//	$_POST["mode"] = "get_home"; 
	//	$user_id = $_SESSION["active_user_id"];
	//	include ("funcionesOracle.php");
	?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	
	<div id="main" class="col-md-8 scroll-container">
		<?php $query = 'call get_integrante(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
			$result = $mysqli->query($query);
			// Imprimir los resultados en HTML
			while ($row = $result->fetch_assoc()) { ?> 
				<div class="col-md-12">
					<a href="player.php"><?php echo $row["nombre"] ?></a>
				</div>						
		<?php } $mysqli->next_result(); ?>
	</div>
	<!-- #main -->
	
	<div class "col-md-4">
		<div class="content-left">
			<div class="cntnt-img">
			</div>
			<div class="bnr-img">
				<img src= <?php echo "profile_pics/".$arrayQuery["FOTO"][0] ?> alt=""/>
			</div>
			<div class="bnr-text">
				<h1>
					<?php if ($edit){ ?>
						Nombre:
						<input type = "text" 
							name = "nombre" 
							value = <?php echo $arrayQuery["NOMBRE"][0] ?>
							default = <?php echo $arrayQuery["NOMBRE"][0] ?>/>
						Primer Apellido:
						<input type = "text" 
							name = "Primer_apellido" 
							value = <?php echo $arrayQuery["PRIMER_APELLIDO"][0] ?>
							default = <?php echo $arrayQuery["PRIMER_APELLIDO"][0] ?>/>
						Segundo Apellido:
						<input type = "text" 
							name = "Segundo_apellido" 
							value = <?php echo $arrayQuery["SEGUNDO_APELLIDO"][0] ?>
							default = <?php echo $arrayQuery["PRIMER_APELLIDO"][0] ?>/>
					<?php } else { ?> 
					<?php echo $arrayQuery["NOMBRE"][0]." ".$arrayQuery["PRIMER_APELLIDO"][0]." ".$arrayQuery["SEGUNDO_APELLIDO"][0] ?>								<?php }	?>
				</h1>
				
				<h5>
					<?php if ($edit){ ?>
						<input type="email"
							value = <?php echo $arrayQuery["EMAIL"][0] ?>
							default = <?php echo $arrayQuery["EMAIL"][0] ?>
							name="Email" />
					<?php } else { ?> 
						<?php echo $arrayQuery["EMAIL"][0] ?>
					<?php }	?>
				</h5>
				
				<p>
					<?php if ($edit){ ?>
						<input type="textarea"
							value = <?php echo $arrayQuery["ID_ESTILOVIDA"]["SLOGAN"][0] ?>
							default = <?php echo $arrayQuery["ID_ESTILOVIDA"]["SLOGAN"][0] ?>
							name="ID_EstiloVida" />
					<?php } else { ?> 
						<?php echo $arrayQuery["ID_ESTILOVIDA"]["SLOGAN"][0] ?>
					<?php }	?>
				</p>
				
				<hr/>
				<div class="resumen">
					<p>
						Genero: <?php if ($edit){ ?>
						<select type="textarea"
							value = <?php echo $arrayQuery["GENERO"][0] ?>
							name="GENERO"> 
							<option value="Masculino" 
								<?php echo $arrayQuery["GENERO"][0] == "Masculino"? "selected" : "" ?> >
								Masculino
							</option>
							<option value="Femenino"
								<?php echo $arrayQuery["GENERO"][0] == "Femenino"? "selected" : "" ?> >
								Femenino
							</option>
						</select>
						<?php } else { ?> 
							<?php echo $arrayQuery["ID_GENERO"]["NOMBRE"][0]?>
						<?php }	?>
					</p>
	
					
					<p>
						<?php if ($edit){ ?>
							Fecha Nacimiento: 
							<input type = "date" 
								name = "Fecha_Nac" 
								value = <?php echo $arrayQuery["FECHA_NAC"][0] ?>
								default = <?php echo $arrayQuery["FECHA_NAC"][0] ?> />
						<?php } else { ?> 
						Edad: <?php echo $arrayQuery["EDAD"][0] ?>
						<?php }	?>
					</p>
					
					<p><?php if ($edit){ ?>
							<select type = "date" 
							name = "Fecha_Nac"></select>
					<?php } else { ?> 
						Ubicación: <?php echo $arrayQuery["ID_CIUDAD"]["NOMBRE"][0].", ".$arrayQuery["ID_CIUDAD"]["ID_ESTADO"]["NOMBRE"][0].", ".$arrayQuery["ID_CIUDAD"]["ID_ESTADO"]["ID_PAIS"]["NOMBRE"][0]?>
					<?php }	?>
					</p>
					<p>Altura: <?php echo $arrayQuery["ID_ASPECTOF"]["ALTURA"][0] ?> </p>
					<p>Peso: <?php echo $arrayQuery["ID_ASPECTOF"]["PESO"][0] ?> </p>
					<p>Busco: <?php echo $arrayQuery["ID_INTERES_GUSTO"]["ID_GENERO"]["NOMBRE"][0]."s"?> </p>
					<p>Entre: <?php echo $arrayQuery["ID_INTERES_GUSTO"]["RANGO_EDADI"][0]." y ".$arrayQuery["ID_INTERES_GUSTO"]["RANGO_EDADF"][0] ?></p>
				</div>
			</div>
			<div class="btm-num">
				<ul>
					<li>
						<h4 id= "num_winks"><?php echo array_key_exists('ID_ENVIADO', $arrayQuery["WINK"]) ? count($arrayQuery["WINK"]["ID_ENVIADO"]): 0;
							?></h4>
						<h5>Winks</h5>
					</li>
					<li>
						<h4><?php echo array_key_exists('ID_VISITANTE', $arrayQuery["VISITAS"]) ?count($arrayQuery["VISITAS"]["ID_VISITANTE"]): 0
							?></h4>
						<h5>Visitas</h5>
					</li>
					<li>
						<h4><?php echo array_key_exists('ID_RECOMENDACION', $arrayQuery["MATCH"]) ? count($arrayQuery["MATCH"]["ID_RECOMENDACION"]) :0
						?></h4>
						<h5>Matches</h5>
					</li>
				</ul>
			</div>
			<?php if($user_id != $_SESSION["active_user_id"]){?>
				<input type="button" id="wink" class="submit action-button" value="Dar un wink"/>
				<hr/>
			<?php }?>
		</div>
	</div>
		
	<?php require_once("footer.php");?>