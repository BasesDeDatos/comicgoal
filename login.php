<!--
Author: W3layouts, Isaac Campos, Roger Villalobos,  Jeffrey Alvarado
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->	
	<?php require_once("header.php") ?>
	
	<?php $_SESSION["active_user_id"] = "" ?> 
			<div class="row">
				<div class="col-md-4 col-md-push-4 login-form" >
					<div class="login-pad">
						<h3>Ingrese</h3>
						<form id="form_data">
							<input name="email" id="email" type="text" value="Correo Electrónico" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Correo Electrónico';}" required="">
							<input name="clave" id="clave" type="password" value="contrasena" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'contrasena';}" required="">							
							<input name="mode" type="hidden" value="loggin">
							<input class="submit" type="button" value="ENTRAR" onclick="logging();">
						</form>
					</div>
				</div>
			</div>
	<?php require_once("footer.php") ?>
	
	<script type="text/javascript">
		function logging(){
			if ($("#Email").val() == "Correo Electrónico" ) $("#Email").click().val("Correo Electrónico Requerido*");
			else if ($("#Clave").val() != "contrasena" ){
				var data = $("#form_data").serialize();
				$.post("funcionesMySQL.php", data, function(data){
					$("body").append("<div id='debug'></div>");
					$("#debug").html(data);
				});
			}
		}
	</script>
