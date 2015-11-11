<!--
Author: W3layouts, Isaac Campos, Roger Villalobos,  Jeffrey Alvarado
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->	
	<?php require_once("header.php") ?>
	
	<?php unset($_SESSION["active_user_id"])?> 
		<div class="row">
			<div class="col-md-4 col-md-push-4 login-form" >
				<div class="login-pad">
					<h3>Ingrese</h3>
					<form id="form_data">
						<div class="col-md-12">
							<input name="email" id="email" type="text" value="Nombre de usuario" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nombre de usuario';}" required="">
							<input name="clave" id="clave" type="password" value="contrasena" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'contrasena';}" required="">							
							<input name="mode" type="hidden" value="login">
							<input class="submit" type="button" value="ENTRAR" onclick="logging();">
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php require_once("footer.php") ?>
	
	<script type="text/javascript">
		function logging(){
			if ($("#email").val() == "Nombre de usuario" ) $("#email").click().val("Nombre de usuario requerido*");
			else if ($("#clave").val() != "contrasena" ){
				var data = $("#form_data").serialize();
				$.post("funcionesMySQL.php", data, function(data){
					$("body").append("<div id='debug'></div>");
					$("#debug").html(data);
				});
			}
		}
	</script>
