<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(HELPERS_PATH.'usersinfo.php'); 
	include_once(MODELS_PATH.'user.php');


?>
<section>
<h3>USUARIOS:</h3>
	<table border='0' cellpadding='4' cellspacing='2'>
		<tr>
			<td rowspan="2"><b>Usuario</b></td>
			<td rowspan="2"><b>Nombre</b></td>
			<td rowspan="2"><b>Apellido</b></td>
			<td rowspan="2"><b>email</b></td>
			<td rowspan="2"><b>Teléfono</b></td>
			<td rowspan="2"><b>ROL</b></td>
			<td colspan="3"><b>ACCIONES</b></td>
		</tr>
		<tr>
			<td><b>Cambiar Rol</b></td>
			<td><b>Editar</b></td>
			<td><b>Eliminar</b></td>
		</tr>

	<?php foreach($result as $r):?>
	<?php $usuario = new User($r['ID'], $r['usuario'], $r['nombre'], $r['apellido'], $r['email'], $r['telefono'], $r['rol']);?>
		<tr>
			<td><b><?=$usuario->getUsuario();?></b></td>
			<td><b><?=$usuario->getNombre();?></b></td>
			<td><b><?=$usuario->getApellido();?></b></td>
			<td><b><?=$usuario->getEmail();?></b></td>
			<td><b><?=$usuario->getTelefono();?></b></td>
			<td><b><?=$usuario->getRol();?></b></td>

			<!--CAMBIAR ROL -->
			<form method='post' action=''>
			<td><input type='text' id='id_usuario' name='id_usuario' value='<?=$usuario->getID();?>' hidden/>
				<input type='text' id='rol_usuario' name='rol_usuario' value='<?=$usuario->getRol();?>' hidden/>		
				<button type='submit' class='edit' id='cambiar' name='cambiar' value='' />
				<?php include (PARTIALS_PATH.'boton-cambiar.html');?>
				</button></td>
			<script> 
				$("#cambiar").click(function(){
					$.ajax({
						type: "POST",
						url: "controllers/cambiar-rol.php",
						data: 'id_usuario='+$("#id_usuario").val()+'&rol_usuario='+$("#rol_usuario").val(),
					});
				});
			</script>
			</form>
			
			<!-- EDITAR USUARIO -- TOGGLE MENU -->			
			<td>
				<button type='submit' class='edit' id='editar-<?=$usuario->getID();?>' name='editar'/>
				<?php include (PARTIALS_PATH.'boton-editar.html');?>
				</button>
						<script>$('#editar-<?=$usuario->getID();?>').click(function(){					
						$('.edit-<?=$usuario->getID();?>').toggle();
						return false;});
						</script></td>
			
			<!-- BORRAR USUARIO -->
			<form method='post' action='controllers/borrar-usuario.php'>
			<td><input type='text' id='id_usuario' name='id_usuario' value='<?=$usuario->getID();?>' hidden/>		
			<button type='submit' class='red' id='borrar-<?=$usuario->getID();?>' name='borrar' value='' onclick="return confirm('¿Realmente desea borrar el usuario?')">
			<?php include (PARTIALS_PATH.'boton-borrar.html');?>
			</button></td></form>

		</tr>
		<!--INSERTAMOS EL FORMULARIO PARA CAMBIAR USUARIO-->
		<?php include(ADMIN_PATH.'admin-partials/users/editar-usuario.php'); ?>
	<?php endforeach;?>

	</table>
</section>