<div class='panel'>    
<!--INFORMACION DE USUARIO-->
<?php
	include_once('helpers/currentuser.php');
	include_once('partials/user-info.php');
?>

<!--INICIO TABLA Y FORMULARIO-->
	<table>
		<!-- ACTUALIZAR USUARIO-->
		<form method="post" id="actualizar" action="controllers/actualizar-usuario.php">
			<tr><?php echo '<input type="text" id="id_usuario" name="id_usuario" value="'.$CURUSER.'" hidden/>' ?>
			
			<!--CAMBIAR NOMBRE-->
				<td>Inserte un nuevo nombre:</td>
				<td><input type="text" id="nuevo_nombre" name="nuevo_nombre"/></td>
				<!--boton formulario-->
				<td rowspan="5"><input type="submit" class="purple" name="CambiarDatos" id="CambiarDatos" value="CAMBIAR DATOS"/></td>
			</tr>

			<!--CAMBIAR APELLIDO-->	
			<tr>		
				<td>Inserte un nuevo apellido:</td>
				<td><input type="text" id="nuevo_apellido" name="nuevo_apellido"/></td>			
			</tr>
		
			<!--CAMBIAR CONTRASEÑA-->	
			<tr>		
				<td>Inserte una contraseña nueva:</td>
				<td><input type="text" id="nuevo_password" name="nuevo_password"/></td>			
			</tr>
		
			<!--CAMBIAR EMAIL-->			
			<tr>
				<td>Inserte un nuevo email:</td> 
				<td><input type="text" id="nuevo_email" name="nuevo_email"/></td>
			</tr>	
	
			<!--CAMBIAR TELÉFONO-->	
			<tr>
				<td>Inserte un nuevo n&uacute;mero de tel&eacute;fono:</td>
				<td><input type="text" id="nuevo_telf" name="nuevo_telf"/></td>
			</tr>
			<tr>
				<td colspan="3"><span id='error-usuario' class='nvaliduser'></span></td>
			</tr>
		</form>
    </table>
</div>

<script>
$(document).ready(function(){
	$("#actualizar").submit(function(event) {
			if(($("#nuevo_nombre").val().length <= 0)&&
			   ($("#nuevo_apellido").val().length <= 0)&&
			   ($("#nuevo_password").val().length <= 0)&&
			   ($("#nuevo_email").val().length <= 0)&&
			   ($("#nuevo_telf").val().length <= 0)){ 
				$("#error-usuario").html("Debe rellenar al menos uno de los campos");
				event.preventDefault();
			}else{}
		});
	});
</script>