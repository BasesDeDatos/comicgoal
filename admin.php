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
	
	<div class="row">
		<div class="col-md-12 register-form">
		<!-- multistep form -->
		<form id="msform">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Mensaje de eventos</li>
				<li>Eventos</li>
				<li>Catalogos</li>
				<li>Catalogos</li>
				<li>Catalogos</li>

			</ul>
			<!-- fieldsets -->
			<fieldset>

				<h2 class="fs-title">Mensaje de invitaciones</h2>
				<input class="col-md-6" type="text" name="subject" id="subject" placeholder="Asunto" />
				<input class="col-md-6" type="textarea" name="mensaje" id="mensaje" placeholder="Nuevo mensaje de invitación" />

				<label class="col-md-6" for="Evento">Evento</label>
				<select class="col-md-6 selector" name="Evento" id="Evento">
					<option value="">Seleccione un evento</option>			
					
					<?php for($i = 0; $i < count($arrayQuery["EVENTO"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["EVENTO"]["ID_CIUDAD"][$i] ?>">
							<?php echo $arrayQuery["EVENTO"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
					
					
				</select>
				
				<input type="button" name="send" class="submit action-button" value="Enviar" onclick="enviar_mensaje()"/>
				<input type="button" name="next" class="next action-button" value="Siguiente"/>
			</fieldset>
			
			<fieldset>

				<h2 class="fs-title">Eventos</h2>
				<input class="col-md-6" type="text" name="nombre_eventos" id="nombre_eventos" placeholder="Nombre del evento" />
				<input class="col-md-6" type="textarea" name="descripcion_eventos" id="descripcion_eventos" placeholder="Descripcion del evento" />

				<label class="col-md-6" for="Pais0">País</label>
				<select class="col-md-6 selector" name="Pais" id="Pais0" >
					<option value="">Seleccione un país</option>
					<?php for($i = 0; $i < count($arrayQuery["PAIS"]["NOMBRE"]); $i++){ ?>
						<option class="<?php echo $arrayQuery["PAIS"]["ID_PAIS"][$i] ?>"
								value="<?php echo $arrayQuery["PAIS"]["ID_PAIS"][$i] ?>">
							<?php echo $arrayQuery["PAIS"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				
				<label class="col-md-6" for="Estado0">Estado</label>
				<select class="col-md-6 selector" name="Estado" id="Estado0">
					<option value="">Seleccione un estado</option>
					<?php for($i = 0; $i < count($arrayQuery["ESTADO"]["NOMBRE"]); $i++){ ?>
						<option class="<?php echo $arrayQuery["ESTADO"]["ID_PAIS"][$i] ?>"
								value="<?php echo $arrayQuery["ESTADO"]["ID_ESTADO"][$i] ?>">
							<?php echo $arrayQuery["ESTADO"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				
				<label class="col-md-6" for="Ciudad0">Ciudad</label>
				<select class="col-md-6 selector" name="Ciudad" id="Ciudad0">
					<option value="">Seleccione una ciudad</option>
					<?php for($i = 0; $i < count($arrayQuery["CIUDAD"]["NOMBRE"]); $i++){ ?>
						<option class="<?php echo $arrayQuery["CIUDAD"]["ID_ESTADO"][$i] ?>"
								value="<?php echo $arrayQuery["CIUDAD"]["ID_CIUDAD"][$i] ?>">
							<?php echo $arrayQuery["CIUDAD"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				
				<label class="col-md-6" id = fecha_evento>Fecha del evento</label>
				<div class="col-md-6"><input type="date" name="fecha_evento_input" id="fecha_evento_input" placeholder="fecha" /></div>
				
				<input type="submit" name="submit" class="submit action-button" value="Registrar evento" onclick="registrar_evento()"/>
				<input type="button" name="previous" class="previous action-button" value="Anterior" />
				<input type="button" name="next" class="next action-button" value="Siguiente"/>
			</fieldset>
			
			<fieldset class = "catalogos">
				
				<h2 class="fs-title">Catalogos</h2>
				<label class="col-md-4" for="signo_zodiacal">Signo Zodiacal</label>
				<select class="col-md-4" name="signo_zodiacal" id="signo_zodiacal">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["SIGNO_ZODIACAL"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["SIGNO_ZODIACAL"]["ID_SIGNO_ZODIACAL"][$i] ?>">
							<?php echo $arrayQuery["SIGNO_ZODIACAL"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="signo_zodiacal_input" placeholder="Nuevo" /></div>
					<div class="col-md-1">
					<button name= "signo_zodiacal_button" class= "eliminar" >X</button>
					</div>

				<label class="col-md-4" for="rol">Rol</label>
				<select class="col-md-4" name="rol" id="rol">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["ROL"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["ROL"]["ID_ROL"][$i] ?>">
							<?php echo $arrayQuery["ROL"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="rol_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "rol_button" class= "eliminar" >X</button>
					</div>


				<label class="col-md-4" for="pais">Pais</label>
				<select class="col-md-4" name="pais" id="pais">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["PAIS"]["NOMBRE"]); $i++){ ?>
						<option class="<?php echo $arrayQuery["PAIS"]["ID_PAIS"][$i] ?>"
								value="<?php echo $arrayQuery["PAIS"]["ID_PAIS"][$i] ?>">
							<?php echo $arrayQuery["PAIS"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="pais_input" placeholder="Nuevo" /></div>
					<div class="col-md-1">
					<button name= "pais_button" class= "eliminar" >X</button>
					</div>

				<label class="col-md-4" for="estado">Estado</label>
				<select class="col-md-4" name="estado" id="estado">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["ESTADO"]["NOMBRE"]); $i++){ ?>
						<option class="<?php echo $arrayQuery["ESTADO"]["ID_PAIS"][$i] ?>"
								value="<?php echo $arrayQuery["ESTADO"]["ID_ESTADO"][$i] ?>">
							<?php echo $arrayQuery["ESTADO"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="estado_input" placeholder="Nuevo" /></div>
					<div class="col-md-1">
					<button name= "estado_button" class= "eliminar" >X</button>
					</div>

				<label class="col-md-4" for="ciudad">Ciudad</label>
				<select class="col-md-4" name="ciudad" id="ciudad">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["CIUDAD"]["NOMBRE"]); $i++){ ?>
						<option class="<?php echo $arrayQuery["CIUDAD"]["ID_ESTADO"][$i] ?>"
								value="<?php echo $arrayQuery["CIUDAD"]["ID_CIUDAD"][$i] ?>">
							<?php echo $arrayQuery["CIUDAD"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="ciudad_input" placeholder="Nuevo" /></div>
					<div class="col-md-1">
					<button name= "ciudad_button" class= "eliminar" >X</button>
					</div>

				<label class="col-md-4" for="religion">Religion</label>
				<select class="col-md-4" name="religion" id="religion">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["RELIGION"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["RELIGION"]["ID_RELIGION"][$i] ?>">
							<?php echo $arrayQuery["RELIGION"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="religion_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "religion_button" class= "eliminar" >X</button>
				</div>
				
				<label class="col-md-4" for="idioma">Idioma</label>
				<select class="col-md-4" name="idioma" id="idioma">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["IDIOMA"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["IDIOMA"]["ID_IDIOMA"][$i] ?>">
							<?php echo $arrayQuery["IDIOMA"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="idioma_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "idioma_button" class= "eliminar" >X</button>
				</div>
				
				<label class="col-md-4" for="educacion">Educacion</label>
				<select class="col-md-4" name="educacion" id="educacion">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["EDUCACION"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["EDUCACION"]["ID_EDUCACION"][$i] ?>">
							<?php echo $arrayQuery["EDUCACION"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="educacion_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "educacion_button" class= "eliminar" >X</button>
				</div>
				
				<input type="button" name="previous" class="previous action-button" value="Anterior" />
				<input type="button" name="next" class="next action-button" value="Siguiente" />
				
			</fieldset>
				
			<fieldset class = "catalogos">
				
				<h2 class="fs-title">Catalogos</h2>
				
				<label  class="col-md-4" for="hobby">Hobby</label>
				<select class="col-md-4" name="hobby" id="hobby">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["HOBBY"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["HOBBY"]["ID_HOBBY"][$i] ?>">
							<?php echo $arrayQuery["HOBBY"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="hobby_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "hobby_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="actividadal">Actividades al aire libre</label>
				<select class="col-md-4" name="actividadal" id="actividadal">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["ACTIVIDAD"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["ACTIVIDAD"]["ID_ACTIVIDADAL"][$i] ?>">
							<?php echo $arrayQuery["ACTIVIDAD"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="actividadal_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "actividadal_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="tipo_bebedor">Tipo de bebedor</label>
				<select class="col-md-4" name="tipo_bebedor" id="tipo_bebedor">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["TIPO_BEBEDOR"]["CLASE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["TIPO_BEBEDOR"]["ID_TIPOBEBEDOR"][$i] ?>">
							<?php echo $arrayQuery["TIPO_BEBEDOR"]["CLASE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="tipo_bebedor_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "tipo_bebedor_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="ocupacion">Ocupación</label>
				<select class="col-md-4" name="ocupacion" id="ocupacion">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["OCUPACION"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["OCUPACION"]["ID_OCUPACION"][$i] ?>">
							<?php echo $arrayQuery["OCUPACION"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="ocupacion_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "ocupacion_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="color_ojos">Color Ojos</label>
				<select class="col-md-4" name="color_ojos" id="color_ojos">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["COLOR_OJOS"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["COLOR_OJOS"]["ID_COLOROJOS"][$i] ?>">
							<?php echo $arrayQuery["COLOR_OJOS"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="color_ojos_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "color_ojos_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="color_piel">Color piel</label>
				<select class="col-md-4" name="color_piel" id="color_piel">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["COLOR_PIEL"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["COLOR_PIEL"]["ID_COLOR_PIEL"][$i] ?>">
							<?php echo $arrayQuery["COLOR_PIEL"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="color_piel_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "color_piel_button" class= "eliminar" >X</button>
				</div>
				
				
				<label class="col-md-4" for="color_pelo">Color Pelo</label>
				<select class="col-md-4" name="color_pelo" id="color_pelo">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["COLOR_PELO"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["COLOR_PELO"]["ID_COLOR_PELO"][$i] ?>">
							<?php echo $arrayQuery["COLOR_PELO"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="color_pelo_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "color_pelo_button" class= "eliminar" >X</button>
				</div>
				<label class="col-md-4" for="contextura">Contextura</label>
				<select class="col-md-4" name="contextura" id="contextura">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["CONTEXTURA"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["CONTEXTURA"]["ID_CONTEXTURA"][$i] ?>">
							<?php echo $arrayQuery["CONTEXTURA"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="contextura_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "contextura_button" class= "eliminar" >X</button>
				</div>
				
				<input type="button" name="previous" class="previous action-button" value="Anterior" />
				<input type="button" name="next" class="next action-button" value="Siguiente" />

			</fieldset>
			
			<fieldset class = "catalogos">
				
				<h2 class="fs-title">Catalogos</h2>
				
				<label class="col-md-4" for="estado_match">Estado Match</label>
				<select class="col-md-4" name="estado_match" id="estado_match">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["ESTADO_MATCH"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["ESTADO_MATCH"]["ID_ESTADO_MATCH"][$i] ?>">
							<?php echo $arrayQuery["ESTADO_MATCH"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="estado_match_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "estado_match_button" class= "eliminar" >X</button>
				</div>
				<label class="col-md-4" for="estado_civil">Estado Civil</label>
				<select class="col-md-4" name="estado_civil" id="estado_civil">
					<option value="">Agregar nuevo</option>
					<option value="1">valor demo</option>
					<?php for($i = 0; $i < count($arrayQuery["ESTADO_CIVIL"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["ESTADO_CIVIL"]["ID_ESTADOCI"][$i] ?>">
							<?php echo $arrayQuery["ESTADO_CIVIL"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="estado_civil_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "estado_civil_button" class= "eliminar" >X</button>
				</div>
				<label class="col-md-4" for="genero">Genero</label>
				<select class="col-md-4" name="genero" id="genero">
					<option value="">Agregar nuevo</option>
					<?php for($i = 0; $i < count($arrayQuery["GENERO"]["NOMBRE"]); $i++){ ?>
						<option value="<?php echo $arrayQuery["GENERO"]["ID_GENERO"][$i] ?>">
							<?php echo $arrayQuery["GENERO"]["NOMBRE"][$i] ?>
						</option>
					<?php } ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="genero_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "genero_button" class= "eliminar" >X</button>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Anterior" />
				<!--input type="submit" name="submit" class="submit action-button" value="Aplicar" /-->

			</fieldset>
		
		</form>
	</div>
	</div>		
	
	<?php require_once("footer.php") ?>

	<script type="text/javascript">
		//jQuery time
		var current_fs, next_fs, previous_fs; //fieldsets
		var left, opacity, scale; //fieldset properties which we will animate
		var animating; //flag to prevent quick multi-click glitches
		
		$(".next").click(function(){
			if(animating) return false;
			animating = true;
			
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();
			
			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
			
			//show the next fieldset
			next_fs.show(); 
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale current_fs down to 80%
					scale = 1 - (1 - now) * 0.2;
					//2. bring next_fs from the right(50%)
					left = (now * 50)+"%";
					//3. increase opacity of next_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({'transform': 'scale('+scale+')'});
					next_fs.css({'left': left, 'opacity': opacity});
				}, 
				duration: 800, 
				complete: function(){
					current_fs.hide();
					animating = false;
				}, 
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		});
		
		$(".previous").click(function(){
			if(animating) return false;
			animating = true;
			
			current_fs = $(this).parent();
			previous_fs = $(this).parent().prev();
			
			//de-activate current step on progressbar
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
			
			//show the previous fieldset
			previous_fs.show(); 
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
					current_fs.css({'left': left});
					previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
				}, 
				duration: 800, 
				complete: function(){
					current_fs.hide();
					animating = false;
				}, 
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		});
		
		$(".submit").click(function(){
			return false;
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
		
		
		$(".catalogos input").change(function(){
			var value = $(this).val();
			var input = $(this).attr("name");
			var nameSelect = input.substring(0, input.length-6) //se borra la palabra "_input" para obtener el select;
			var row_id = $("select[name='"+nameSelect+"'] option:selected").val();
			if ($("select[name='"+nameSelect+"']").val() == ""){ // ADD
				if(nameSelect != "ciudad" && nameSelect != "estado"){
					var data = "mode=registrar_catalogo&procedure=REGISTRAR_"+nameSelect+"&value="+value;
					$.ajax({  
						type: "POST",
						data: data,
						url: "funcionesOracle.php",
						success: function(data){
							$("#debug").html(data);
						},
					});
				}
				else if (nameSelect == "ciudad"){
					var estado = $("#estado").val()
					var data = "mode=registrar_ciudad&procedure=REGISTRAR_"+nameSelect+"&value="+value+ "&id_estado="+estado;
					$.ajax({  
						type: "POST",
						data: data,
						url: "funcionesOracle.php",
						success: function(data){
							$("#debug").html(data);
						},
					});
				}else if (nameSelect == "estado"){
					var pais = $("#pais").val()
					var data = "mode=registrar_estado&procedure=REGISTRAR_"+nameSelect+"&value="+value+ "&id_pais="+pais;
					$.ajax({  
						type: "POST",
						data: data,
						url: "funcionesOracle.php",
						success: function(data){
							$("#debug").html(data);
						},
					});
					
				}
				
				var id = $("select[name='"+nameSelect+"'] option").length;
				$("select[name='"+nameSelect+"']").append("<option value='"+id+"'>"+value+"</option>");
				$("select[name='"+nameSelect+"'] option").last().attr("selected", "selected");
				
			}
			else{ //EDIT
				var data = "mode=editar_catalogo&procedure=EDITAR_"+nameSelect+"&value="+value+ "&row_id="+row_id;
				$.ajax({  
					type: "POST",
					url: "funcionesOracle.php",
					data: data,
					success: function(data){
						$("#debug").html(data);
					}
				});
				$("select[name='"+nameSelect+"'] option:selected").html(value);
			}
		});
		
		
		$("#ciudad").change(function(){
			
			var input = $("input[name='"+$(this).attr("name")+"_input']");
			if ($(this).val() == ""){ input.val(""); } 
			else { input.val( $(this).find("option:selected").text().trim());}
		})
		
		
		
		
		$(".eliminar").click(function(){
			var input = $(this).attr("name");
			var nameSelect = input.substring(0, input.length-7) //se borra la palabra "_bootton" ;
			var row_id = $("select[name='"+nameSelect+"'] option:selected").val();
			var data = "mode=borrar_catalogo&procedure=BORRAR_"+nameSelect+ "&row_id="+row_id;
				$.ajax({  
					type: "POST",
					url: "funcionesOracle.php",
					data: data,
					success: function(data){
						$("#debug").html(data);
					}
				});
				$("select[name='"+nameSelect+"'] option:selected").remove();
		})
		
		
		
		function registrar_evento(){
//			alert($("#Ciudad0").val());
			var nombre_eventos = $("#nombre_eventos").val();
			var descripcion_eventos = $("#descripcion_eventos").val();
			var fecha_eventos = $("#fecha_evento_input").val();
			var ciudad_eventos = $("#Ciudad0").val();

			var data = "mode=registrar_evento&nombre_eventos="+nombre_eventos+"&descripcion_eventos="+descripcion_eventos+"&fecha_eventos="+fecha_eventos+"&ciudad_eventos="+ciudad_eventos;
			$.ajax({  
				    type: "POST",
				    url: "funcionesOracle.php",
				    data: data,
				    success: function(data){
				    	$("#debug").html(data);
				    }
			});
		}
		
		function enviar_mensaje(){
//			alert($("#Ciudad0").val());
			var subject = $("#subject").val();
			var mensaje = $("#mensaje").val();
			var ciudad = $("#Evento").val();

			var data = "mode=enviar_mail&subject="+subject+"&mensaje="+mensaje+"&ciudad="+ciudad;
			$.ajax({  
				    type: "POST",
				    url: "funcionesOracle.php",
				    data: data,
				    success: function(data){
				    	$("#debug").html(data);
				    }
			});
		}
		
	</script>