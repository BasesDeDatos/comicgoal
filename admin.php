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
		<form id="msform">
			<!-- progressbar -->
			<ul id="progressbar">
				<li>Catalogos</li>

			</ul>
			<!-- fieldsets -->
			<fieldset class = "catalogos">
				
				<h2 class="fs-title">Catalogos</h2>
				
				<label class="col-md-4" for="confederacion">Confederacion</label>
				<select class="col-md-4" name="confederacion" id="confederacion">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_confederacion(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_Confederacion"] ?>"><?php echo $row["nombre"]?></option>
					<?php } include("conexionMySQL.php") ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="confederacion_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "confederacion_button" class= "eliminar" >X</button>
				</div>
				
				<label class="col-md-4" for="pais">Pais</label>
				<select class="col-md-4" name="pais" id="pais">
					<option value="">Agregar nuevo</option>
					<?php $query = 'call get_pais(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_pais"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="pais_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "pais_button" class= "eliminar" >X</button>
				</div>
				
				<label class="col-md-4" for="continente">Continente</label>
				<select class="col-md-4" name="continente" id="continente">
					<option value="">Agregar nuevo</option>
					<?php $query = 'call get_continente(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
						$result = $mysqli->query($query);
						// Imprimir los resultados en HTML
						while ($row = $result->fetch_assoc()) { ?> 
							<option value="<?php echo $row["ID_continente"] ?>"><?php echo $row["nombre"]?></option>
					<?php } $mysqli->next_result(); ?>
				</select>
				<div class="col-md-3"><input class="col-md-6" type="text" name="pais_input" placeholder="Nuevo" /></div>
				<div class="col-md-1">
					<button name= "continente_button" class= "eliminar" >X</button>
				</div>
				
				<label class="col-md-4" for="Premio">premio</label>
				<select class="col-md-4" name="premio" id="premio">
					<option value="" selected>Agregar nuevo</option>
					<?php $query = 'call get_premio(null)';   ////EJEMPLO DE COMO HACER UNA CONSULTA
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