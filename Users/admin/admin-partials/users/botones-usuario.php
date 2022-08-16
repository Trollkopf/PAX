<!--CAMBIAR ROL -->
<form method='post' action='controllers/cambiar-rol.php'>
			<td><input type='text' id='id_usuario' name='id_usuario' value='<?=$usuario->getID();?>' hidden/>
				<input type='text' id='rol_usuario' name='rol_usuario' value='<?=$usuario->getRol();?>' hidden/>		
				<button type='submit' class='edit' id='cambiar' name='cambiar' value='' />
				<?php include (PARTIALS_PATH.'boton-cambiar.html');?>
				</button></td>
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