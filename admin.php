<!--
Author: Isaac Campos, Roger Villalobos,  Jeffrey Alvarado
Template name: admin
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
	<?php require_once("header.php");
		/*$arrayQuery = array(); 
		$_POST["mode"] = "get_catalogos"; 
		include ("funcionesOracle.php");
		if ($arrayQuery ["ID_ROL"][0] == 1 ){
			header('Location: index.php');
		}*/
	?>
	
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">

	<div class="row">
		<div class="col-md-12 register-form">
		<!-- multistep form -->
		<div id="msform">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Catálogos</li>
				<li>Partidos</li>
				<li>Equipos</li>
				<li>Integrantes</li>
				<li>Equipo por evento</li>
				<li>Alineación</li>
				<li>Estadísticas</li>
				<li>Usuarios</li>
				<li>Premios</li>

			</ul>
			<!-- fieldsets -->
			
			<fieldset class = "catalogos current">
				<h2 class="fs-title">Catálogos</h2>
				
				<label class="col-md-4" for="confederacion">Confederación</label>
				<select class="col-md-4" name="confederacion" id="confederacion">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_confederacion(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_Confederacion"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="confederacion_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "confederacion_button" class= "eliminar" >X</button>
				</div>
				
				<!--label class="col-md-4" for="pais">Pais</label>
				<select class="col-md-4" name="pais" id="pais">
					<option value="">Agregar nuevo</option>
					<?php $query = 'call get_pais(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_pais"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="pais_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "pais_button" class= "eliminar" >X</button>
				</div-->
				
				<label class="col-md-4" for="continente">Continente</label>
				<select class="col-md-4" name="continente" id="continente">
					<option value="">Agregar nuevo</option>
					<?php $query = 'call get_continente(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_continente"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="continente_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "continente_button" class= "eliminar" >X</button>
				</div>
				
				<label class="col-md-4" for="premio">Premio</label>
				<select class="col-md-4" name="premio" id="premio">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_premio(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_premio"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="premio_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "premio_button" class= "eliminar" >X</button>
				</div>
				
				<label class="col-md-4" for="estadio">Estadio</label>
				<select class="col-md-4" name="estadio" id="estadio">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_estadio(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_estadio"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="estadio_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "estadio_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="evento">Evento</label>
				<select class="col-md-4" name="evento" id="evento">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_evento(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_evento"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="evento_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "evento_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="grupo">Grupo</label>
				<select class="col-md-4" name="grupo" id="grupo">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_grupo(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_grupo"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="grupo_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "grupo_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="posicion">Posición</label>
				<select class="col-md-4" name="posicion" id="posicion">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_posicion(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_posicion"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="posicion_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "posicion_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="tipo_estadistica">Estadística</label>
				<select class="col-md-4" name="tipo_estadistica" id="tipo_estadistica">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_tipo_estadistica(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_tipo_estadistica"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="tipo_estadistica_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "tipo_estadistica_button" class= "eliminar" >X</button>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Partidos</h2>
				
				<label class="col-md-6" for="editarpartido">Partido</label>
				<select class="col-md-6" name="editarpartido" id="editarpartido">
					<option value="" selected>Elija un partido</option>
					<?php $query = 'call get_partido(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_partido"] ?>"><?php echo $row["resumen"] ?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="eventopartido">Evento</label>
				<select class="col-md-6" name="ID_evento" id="eventopartido">
					<option value="" selected>Elija un evento</option>
					<?php $query = 'call get_evento(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_evento"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="estadiopartido">Estadio</label>
				<select class="col-md-6" name="ID_estadio" id="estadiopartido">
					<option value="" selected>Elija un estadio</option>
					<?php $query = 'call get_estadio(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_estadio"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="localpartido">Equipo local</label>
				<select class="col-md-6" name="ID_equipo_local" id="localpartido">
					<option value="" selected>Elija un equipo</option>
					<?php $query = 'call get_equipo(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_equipo"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="visitapartido">Equipo visita</label>
				<select class="col-md-6" name="ID_equipo_visita" id="visitapartido">
					<option value="" selected>Elija un equipo</option>
					<?php $query = 'call get_equipo(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_equipo"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="fechapartido">Fecha: </label>
				<div class="col-md-6"><input type="date" name="fecha" id="fechapartido" placeholder="fecha" /></div>
				
				<label class="col-md-6" for="horapartido">Hora: </label>
				<div class="col-md-6"><input type="time" name="hora" id="horapartido" placeholder="hora" /></div>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_partido()"/>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Equipos</h2>
				
				<label class="col-md-6" for="editarequipo">Equipo</label>
				<select class="col-md-6" name="editarequipo" id="editarequipo">
					<option value="" selected>Elija un equipo</option>
					<?php $query = 'call get_equipo(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_equipo"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<div class="col-md-12" style="margin-bottom: 15px;">
					<input type="file" name="archivo" id="input-foto-equipo" accept="image/*"/>
					<input type="hidden" name="fotoequipo" id="fotoequipo"/>
				</div>
				
				<label class="col-md-6" for="confederacionequipo">Confederación</label>
				<select class="col-md-6" name="confederacionequipo" id="confederacionequipo">
					<option value="" selected>Elija una confederación</option>
					<?php $query = 'call get_confederacion(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_Confederacion"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="continenteequipo">Continente</label>
				<select class="col-md-6" name="continenteequipo" id="continenteequipo">
					<option value="" selected>Elija un continente</option>
					<?php $query = 'call get_continente(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_continente"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="paisequipo">País</label>
				<select class="col-md-6" name="paisequipo" id="paisequipo">
					<option value="" selected>Elija un país</option>
					<?php $query = 'call get_pais(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_pais"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_equipo()"/>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Integrantes</h2>
				
				<label class="col-md-6" for="editarintegrante">Integrante</label>
				<select class="col-md-6" name="editarintegrante" id="editarintegrante">
					<option value="" selected>Elija un integrante</option>
					<?php $query = 'call get_integrante(null, null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_integrante"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<div class="col-md-12" style="margin-bottom: 15px;">
					<input type="file" name="archivo" id="input-foto-integrante" accept="image/*"/>
					<input type="hidden" name="fotointegrante" id="fotointegrante"/>
				</div>
				<div class="col-md-6"><input type="text" name="nombre" id="nombre" placeholder="Nombre" /></div>
				<div class="col-md-6"><input type="text" name="primer_apellido" id="primer_apellido" placeholder="Primer apellido" /></div>
				<div class="col-md-6"><input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo apellido" /></div>
				
				<label class="col-md-3" for="numerointegrante">Número</label>
				<select class="col-md-3" name="numerointegrante" id="numerointegrante">
					<option value="" selected>Elija un número</option>
					<?php for($i = 1; $i < 31; $i++){ ?>
						<option value="<?php echo $i ?>">
							<?php echo $i ?>
						</option>
					<?php } ?>
				</select>
				
				<label class="col-md-6" for="fecha_nac">Fecha de nacimiento: </label>
				<div class="col-md-6"><input type="date" name="fecha_nac" id="fecha_nac" placeholder="fecha" /></div>
				
				<label class="col-md-6" for="nacionalidadintegrante">Nacionalidad</label>
				<select class="col-md-6" name="nacionalidadintegrante" id="nacionalidadintegrante">
					<option value="" selected>Elija un país</option>
					<?php $query = 'call get_pais(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_pais"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="equipointegrante">Equipo</label>
				<select class="col-md-6" name="equipointegrante" id="equipointegrante">
					<option value="" selected>Elija un equipo</option>
					<?php $query = 'call get_equipo(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_equipo"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="posicionintegrante">Posición</label>
				<select class="col-md-6" name="posicionintegrante" id="posicionintegrante">
					<option value="" selected>Elija una posicion</option>
					<?php $query = 'call get_posicion(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_posicion"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_integrante()"/>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Equipos por eventos</h2>
				
				<label class="col-md-6" for="equiposXevento">Evento</label>
				<select class="col-md-6" name="equiposXevento" id="equiposXevento">
					<option value="" selected>Elija un evento</option>
					<?php $query = 'call get_evento(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_evento"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<div class="col-md-12 scroll-container">
					<?php $query = 'call get_equipo(null)';
						$result = $mysqli->query($query);
						while ($row = $result->fetch_assoc()) { ?> 
							<div class="col-md-1">
								<input type="checkbox" name = equipos[] id="<?php echo $row["nombre"] ?>" />
							</div>						
							<div class="col-md-5">
								<label for="<?php echo $row["nombre"] ?>">
									<?php echo $row["nombre"] ?>
								</label>
							</div>
					<?php } $mysqli->next_result(); ?>
				</div>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_equipoXevento()"/>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Alineación</h2>
				
				<label class="col-md-6" for="integrantesXpartido">Elija un partido</label>
				<select class="col-md-6" name="integrantesXpartido" id="integrantesXpartido">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_partido(null)';
						$result = $mysqli->query($query);
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_partido"] ?>"><?php echo $row["resumen"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6">Local</label>
				<label class="col-md-6">Visitante</label>
				
				<div class="col-md-6 scroll-container">
					<?php $query = 'call get_integrante(null, null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<div class="col-md-12">
								<input type="checkbox" name = "integrantes_local[]" value="<?php echo $row["ID_integrante"] ?>" /><label><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?></label>
							</div>						
					<?php } $mysqli->next_result(); ?>
				</div>
				
				<div class="col-md-6 scroll-container">
					<?php $query = 'call get_integrante(null, null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<div class="col-md-12">
								<input type="checkbox" name = "integrantes_visita[]" value="<?php echo $row["ID_integrante"] ?>" /><label><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"] ?></label>
							</div>
					<?php } $mysqli->next_result(); ?>
				</div>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_integranteXpartido()"/>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Estadísticas</h2>
				
				<label class="col-md-6" for="partidoestadistica">Partido</label>
				<select class="col-md-6" name="partidoestadistica" id="partidoestadistica">
					<option value="" selected>Elija un partido</option>
					<?php $query = 'call get_partido(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_partido"] ?>"><?php echo $row["resumen"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="integranteestadistica">Integrante</label>
				<select class="col-md-6" name="integranteestadistica" id="integranteestadistica">
					<option value="" selected>Elija un jugador</option>
					<?php $query = 'call get_integrante(null, null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_integrante"] ?>"><?php echo $row["nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-4" for="estadisticanueva">Estadísticas</label>
				<select class="col-md-4" name="estadisticanueva" id="estadisticanueva">
					<option value="" selected>Elija una estadística</option>
					<?php $query = 'call get_tipo_estadistica(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_tipo_estadistica"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-2" for="minuto">Minuto</label>
				<select class="col-md-2" name="minuto" id="minuto"
					<option value="" selected>Elija un minuto</option>
					<?php for($i = 1; $i < 121; $i++){ ?>
						<option value="<?php echo $i ?>">
							<?php echo $i ?>
						</option>
					<?php } ?>
				</select>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_estadisticaXpartido()"/>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Usuarios</h2>
				
				<label class="col-md-6" for="usuario">Usuarios</label>
				<select class="col-md-6" name="usuario" id="usuario">
					<option value="" selected>Elija un usuario</option>
					<?php $query = 'call get_usuario(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_usuario"] ?>"><?php echo $row["email"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<div class="col-md-6"><input type="text" name="email" id="email" placeholder="E-Mail" /></div>
				
				<div class = "col-md-6">
					<div class="col-md-12"><input type="password" name="password1" id="password1" placeholder="Contraseña" /></div>
					<div class="col-md-12"><input type="password" name="password2" id="password2" placeholder="Repita la contraseña" /></div>
				</div>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_usuario()"/>
				</div>
				
			</fieldset>
			
			<fieldset>
				<h2 class="fs-title">Premios</h2>
				
				<label class="col-md-6" for="premioXequipo">Equipo</label>
				<select class="col-md-6" name="premioXequipo" id="premioXequipo">
					<option value="" selected>Elija un equipo</option>
					<?php $query = 'call get_equipo(null)';
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_equipo"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				
				<label class="col-md-6" for="premionuevo">Premio</label>
				
				<div class="col-md-6">
					<select class="col-md-6" name="premionuevo" id="premionuevo">
						<option value="" selected>Elija un premio</option>
						<?php $query = 'call get_premio(null)';
							$result = $mysqli->query($query);
							// Imprimir los resultados en HTML
							while ($row = $result->fetch_assoc()) { ?> 
								<option value="<?php echo $row["ID_premio"] ?>"><?php echo $row["nombre"]?></option>
						<?php } $mysqli->next_result(); ?>
					</select>
					
					<div class="col-md-6"><input type="text" name="cantidadpremio" id="cantidadpremio" placeholder="Cantidad" /></div>
				</div>
				
				<div class = "col-md-12">
					<input type="submit" name="submit" class="submit action-button" value="Aplicar" onclick="registrar_premioXequipo()"/>
				</div>
				
			</fieldset>
		
		</div>
		</div>
	</div>		
	
	<?php require_once("footer.php") ?>
	
	<script type="text/javascript" src="js/fileinput.min.js"></script>

	<script type="text/javascript">
		//jQuery time
		var current_fs, next_fs, previous_fs; //fieldsets
		var left, opacity, scale; //fieldset properties which we will animate
		var animating; //flag to prevent quick multi-click glitches
		
		
		$("#progressbar li").click(function(){
			var clickedElem = $(this);
			if(	!clickedElem.hasClass("active") ){
				var clickedIndex = $("#progressbar li").index($(this));
				var activeIndex = $("#progressbar li").index($("#progressbar .active"))
				if( clickedIndex < activeIndex ){
					var current_fs = jQuery( "fieldset:eq("+activeIndex+")" );	
					var previous_fs = jQuery( "fieldset:eq("+clickedIndex+")" );	
					moverIzquierda(current_fs, previous_fs);
				} else {
					var current_fs = jQuery( "fieldset:eq("+activeIndex+")" );	
					var next_fs = jQuery( "fieldset:eq("+clickedIndex+")" );
					moverDerecha(current_fs, next_fs);
				}
			}
		})
		
		function moverDerecha(current_fs, next_fs){
			
			if(animating) return false;
			animating = true;
			
			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").removeClass("active");
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
			
			//show the next fieldset
			next_fs.show().css({'left': 0}); 
			$(".register-form").css({'height': $(".register-form").height()});
			//hide the current fieldset with style
			setTimeout(function(){ next_fs.addClass("current") }, 799)

			current_fs.animate({opacity: 0}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale current_fs down to 80%
					scale = 1 - (1 - now) * 0.2;
					//2. bring next_fs from the right(50%)
					left = (now * 50)+"%";
					//3. increase opacity of next_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({'transform': 'scale('+scale+')'}).removeClass("current");
					next_fs.css({'left': left, 'opacity': opacity});
				}, 
				duration: 800, 
				complete: function(){
					current_fs.hide();
					$(".register-form").css({'height': "auto"});
					animating = false;
				}, 
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		}
		
		$(".next").click(function(){
			var current_fs = $(this).parent();
			var next_fs = $(this).parent().next();
			moverDerecha(current_fs, next_fs);
		});
		
		$(".previous").click(function(){
			var current_fs = $(this).parent();
			var previous_fs = $(this).parent().prev();
			moverIzquierda(current_fs, previous_fs);
		});
		function moverIzquierda(current_fs, previous_fs){
			if(animating) return false;
			animating = true;
			
			//de-activate current step on progressbar
			$("#progressbar li").removeClass("active");
			$("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
			$(".register-form").css({'height': $(".register-form").height()});

			//show the previous fieldset
			previous_fs.show().css({'left': 0});
			
			setTimeout(function(){ previous_fs.addClass("current"); }, 799)
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale previous_fs from 80% to 100%
					scale = 0.8 + (1 - now) * 0.2;
					//2. take current_fs to the right(50%) - from 0%
					left = ((1-now) * 50)+"%";
					//3. increase opacity of previous_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({'left': left}).removeClass("current");
					previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
				}, 
				duration: 800, 
				complete: function(){
					current_fs.hide();
					$(".register-form").css({'height': "auto"});
					animating = false;
				}, 
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		}
		
		$(".submit").click(function(){
			return false;
		});
		
		$("#input-foto-equipo").fileinput({
			maxFileCount: 1,
			maxFileSize: "4000",
			
			uploadUrl: "uploadFoto.php", // server upload action
    		uploadAsync: false,
			
			previewFileType: "image",
			
			allowedFileExtensions: ["jpg", "png", "gif"],
			    
			browseLabel: "Cargar Foto",
			dropZoneTitle: "Arrastre su foto hasta aquí",

			showUpload: false,
			showCaption: false,
			showRemove: false,

			layoutTemplates: {
				main1: 
				'{preview}\n' +
				'<div class="kv-upload-progress"></div>\n' +
				'<div class="input-group {class}">\n' +
				'   {caption}\n' +
				'   <div class="input-group-btn">\n' +
				'       {remove}\n' +
				'       {cancel}\n' +
				'       {upload}\n' +
				'       {browse}\n' +
				'   </div>\n' +
				'</div>',
			}
		}).on("filebatchselected", function(event, files) {
			// trigger upload method immediately after files are selected
			$(this).fileinput("upload");
			//console.dir(files);// debug
		
			var nombreImagen = files[0]["name"];
			var rutaImagenCargada = nombreImagen;
			$("#fotoequipo").val(rutaImagenCargada);
		});
		
		$("#input-foto-integrante").fileinput({
			maxFileCount: 1,
			maxFileSize: "4000",
			
			uploadUrl: "uploadFoto.php", // server upload action
    		uploadAsync: false,
			
			previewFileType: "image",
			
			allowedFileExtensions: ["jpg", "png", "gif"],
			    
			browseLabel: "Cargar Foto",
			dropZoneTitle: "Arrastre su foto hasta aquí",

			showUpload: false,
			showCaption: false,
			showRemove: false,

			layoutTemplates: {
				main1: 
				'{preview}\n' +
				'<div class="kv-upload-progress"></div>\n' +
				'<div class="input-group {class}">\n' +
				'   {caption}\n' +
				'   <div class="input-group-btn">\n' +
				'       {remove}\n' +
				'       {cancel}\n' +
				'       {upload}\n' +
				'       {browse}\n' +
				'   </div>\n' +
				'</div>',
			}
		}).on("filebatchselected", function(event, files) {
			// trigger upload method immediately after files are selected
			$(this).fileinput("upload");
			//console.dir(files);// debug
		
			var nombreImagen = files[0]["name"];
			var rutaImagenCargada = nombreImagen;
			$("#fotointegrante").val(rutaImagenCargada);
		});
		
		$("#Pais0").change(function(){
			$("#Ciudad0").val("");
			$("#Ciudad0 option:not(:first)").hide();
			$("#Estado0").val("");
			$("#Estado0 option:not(:first)").hide();
			$("#Estado0 ."+$(this).val()).show();
		});
		
		$("#Pais").change(function(){
			$("#Ciudad").val("");
			$("#Estado").val("");
			$("#Ciudad option:not(:first)").hide();
			$("#Estado option:not(:first)").hide();
			$("#Estado ."+$(this).val()).show();
		});
		
		$("#Estado0").change(function(){
			$("#Ciudad0").val("");
			$("#Ciudad0 option:not(:first)").hide();
			$("#Ciudad0 ."+$(this).val()).show();
		});
		
		$("#Estado").change(function(){
			$("#Ciudad").val("");
			$("#Ciudad option:not(:first)").hide();
			$("#Ciudad ."+$(this).val()).show();
		});

		$(".catalogos select").change(function(){
			var input = $("input[name='"+$(this).attr("name")+"_input']");
			if ($(this).val() == ""){ input.val(""); } 
			else { input.val( $(this).find("option:selected").text().trim());}
		});
		
		$(".catalogos input").change(function(e){
			e.preventDefault();
			var value = $(this).val();
			var input = $(this).attr("name");
			var nameSelect = input.substring(0, input.length-6) //se borra la palabra "_input" para obtener el select;
			var row_id = $("select[name='"+nameSelect+"'] option:selected").val();
			if ($("select[name='"+nameSelect+"']").val() == ""){ // ADD
				var data = "mode=registrar_catalogo&procedure=registrar_"+nameSelect+"&value="+value;
				$.ajax({  
					type: "POST",
					data: data,
					dataType: "json",
					url: "funcionesMySQL.php",
					success: function(data){
						$("select[name='"+nameSelect+"']").append("<option value='"+data.ID+"'>"+value+"</option>");
						$("select[name='"+nameSelect+"'] option").last().attr("selected", "selected");
						alert("Se insertó "+value.toUpperCase()+" con éxito en el catálogo "+nameSelect.toUpperCase()+".");
					},
					error: function (data){
						alert("Ha ocurrido un error al registrar "+value.toUpperCase()+" en el catálogo "+nameSelect.toUpperCase()+".");
					}
				});
			}
			else{ //EDIT
				var data = "mode=editar_catalogo&procedure=editar_"+nameSelect+"&value="+value+"&row_id="+row_id;
				$.ajax({  
					type: "POST",
					url: "funcionesMySQL.php",
					data: data,
					success: function(data){
						alert("Se editó "+value.toUpperCase()+" con éxito en el catálogo "+nameSelect.toUpperCase()+".");
					},
					error: function (data){
						alert("Ha ocurrido un error al editar "+value.toUpperCase()+" en el catálogo "+nameSelect.toUpperCase()+".");
					}
				});
				$("select[name='"+nameSelect+"'] option:selected").html(value);
			}
		});
		
		$(".eliminar").click(function(){
			var input = $(this).attr("name");
			var nameSelect = input.substring(0, input.length-7) //se borra la palabra "_button" ;
			var row_id = $("select[name='"+nameSelect+"'] option:selected").val();
			var data = "mode=borrar_catalogo&procedure=borrar_"+nameSelect+ "&row_id="+row_id;
			$.ajax({  
				type: "POST",
				data: data,
				dataType: "json",
				url: "funcionesMySQL.php",
				success: function(data){
						alert("Se borró con éxito en el catálogo "+nameSelect.toUpperCase()+".");
				},
				error: function (data){
					alert("Ha ocurrido un error al borrar en el catálogo "+nameSelect.toUpperCase()+".");
				}
			});
			$("select[name='"+nameSelect+"'] option:selected").remove();
		});
		
		$("#editarpartido").change(function(){
			var data = "mode=callProcedure&procedure=get_partido&param1="+$(this).val();
			$.ajax({  
			    type: "POST",
			    data: data,
			    url: "funcionesMySQL.php",
			    dataType: "json",
			    success: function(data){
					 $.each(data.data[0], function (i, fb) {
						$(".current [name='"+i+"']").val(fb);
					});
				},
				error: function (data){
					alert("Ha ocurrido un error obtener la información de este partido.");
					console.dir(data)
				}
			});
		})
		function registrar_partido(){
			var evento = $("#eventopartido").val();
			var estadio = $("#estadiopartido").val();
			var equipo_local = $("#localpartido").val();
			var equipo_visita = $("#visitapartido").val();
			var fecha = $("#fechapartido").val();
			var hora = $("#horapartido").val();

			var data = "mode=registrar_partido&evento="+evento+"&estadio="+estadio+"&equipo_local="+equipo_local+"&equipo_visita="+equipo_visita+"&fecha="+fecha+"&hora="+hora;
			$.ajax({  
				    type: "POST",
				    data: data,
				    url: "funcionesMySQL.php",
				    dataType: "json",
				    success: function(data){
						alert("Se insertó con éxito el partido");
					},
					error: function (data){
						alert("Ha ocurrido un error al insertar el partido");
					}
			});
		};
		
		function registrar_equipo(){
			var escudo = $("#fotoequipo").val();
			var confederacion = $("#confederacionequipo").val();
			var continente = $("#continenteequipo").val();
			var pais = $("#paisequipo").val();

			var data = "mode=registrar_equipo&escudo="+escudo+"&confederacion="+confederacion+"&continente="+continente+"&pais="+pais;
			$.ajax({  
				    type: "POST",
				    data: data,
				    url: "funcionesMySQL.php",
				    dataType: "json",
				    success: function(data){
						alert("Se insertó con éxito el equipo");
					},
					error: function (data){
						alert("Ha ocurrido un error al insertar el equipo");
					}
			});
		};
		
		function registrar_integrante(){
			var nombre = $("#nombre").val();
			var primer_apellido = $("#primer_apellido").val();
			var segundo_apellido = $("#segundo_apellido").val();
			var numero = $("#numerointegrante").val();
			var foto = $("#fotointegrante").val();
			var fecha_nac = $("#fecha_nac").val();
			var nacionalidad = $("#nacionalidadintegrante").val();
			var posicion = $("#posicionintegrante").val();
			var equipo = $("#equipointegrante").val();
			
			var data = "mode=registrar_integrante&nombre="+nombre+"&primer_apellido="+primer_apellido+
					   "&segundo_apellido="+segundo_apellido+"&numero="+numero+"&foto="+foto+"&fecha_nac="+fecha_nac+
					   "&nacionalidad="+nacionalidad+"&posicion="+posicion+"&equipo="+equipo;
					  
			$.ajax({  
				    type: "POST",
				    data: data,
				    url: "funcionesMySQL.php",
				    dataType: "json",
				    success: function(data){
						alert("Se insertó con éxito el integrante");
					},
					error: function (data){
						alert("Ha ocurrido un error al insertar el integrante");
					}
			});
			
		};
		
		function registrar_equipoXevento(){
			var evento = $("#equiposXevento").val();
			var equipos = $("input[name='equipos[]']").val();
			
			var data = "mode=registrar_equipoXevento&evento="+evento+"&equipos="+equipos;
					  
			$.ajax({  
				    type: "POST",
				    data: data,
				    url: "funcionesMySQL.php",
				    dataType: "json",
				    success: function(data){
						alert("Se insertó con éxito el integrante");
					},
					error: function (data){
						alert("Ha ocurrido un error al insertar el integrante");
					}
			});
		};
			
		function registrar_estadisticaXpartido(){
			var integrante = $("#integranteestadistica").val();
			var partido = $("#partidoestadistica").val();
			var estadistica = $("#estadisticanueva").val();
			var minuto = $("#minuto").val();
			
			var data = "mode=registrar_estadisticaXpartido&integrante="+integrante+"&partido="+partido+"&estadistica="+estadistica+"&minuto="+minuto;
					  
			$.ajax({  
			    type: "POST",
			    data: data,
			    url: "funcionesMySQL.php",
			    dataType: "json",
			    success: function(data){
					alert("Se insertó con éxito la estadística");
				},
				error: function (data){
					alert("Ha ocurrido un error al insertar la estadística");
				}
			});
		};
		
		function registrar_usuario(){
			var email = $("#email").val();
			var password1 = $("#password1").val();
			var password2 = $("#password2").val();
			
			if (password1 == password2){
				
				var data = "mode=registrar_usuario&email="+email+"&password="+password1;
						  
				$.ajax({  
				    type: "POST",
				    data: data,
				    url: "funcionesMySQL.php",
				    dataType: "json",
				    success: function(data){
						alert("Se insertó con éxito el usuario");
					},
					error: function (data){
						alert("Ha ocurrido un error al insertar el usuario");
					}
				});
			}
			
			else {
				alert("Las contraseñas no coinciden");
			}
		};
		
		function registrar_premioXequipo(){
			var equipo = $("#premioXequipo").val();
			var premio = $("#premionuevo").val();
			var cantidad = $("#cantidadpremio").val();
			
			var data = "mode=registrar_premioXequipo&equipo="+equipo+"&premio="+premio+"&cantidad="+cantidad;
					  
			$.ajax({  
			    type: "POST",
			    data: data,
			    url: "funcionesMySQL.php",
			    dataType: "json",
			    success: function(data){
					alert("Se insertó con éxito el premio");
				},
				error: function (data){
					alert("Ha ocurrido un error al insertar el premio");
				}
			});
			
		};
		
		function registrar_integranteXpartido(){
			var partido = $("#integrantesXpartido").val();
			var integrantes_local = $("input[name='integrantes_local[]']").serialize();
			var integrantes_visita = $("input[name='integrantes_visita[]']").serialize();
			
			console.dir(integrantes_local);
			
			var data = "mode=registrar_integranteXpartido&partido="+partido+"&integrantes_local="+integrantes_local+"&integrantes_visita="+integrantes_visita;
					  
			$.ajax({  
			    type: "POST",
			    data: data,
			    url: "funcionesMySQL.php",
			    dataType: "json",
			    success: function(data){
					alert("Se insertó con éxito los integrantes");
				},
				error: function (data){
					alert("Ha ocurrido un error al insertar los integrantes.");
				}
			});
			
		};
		
	</script>