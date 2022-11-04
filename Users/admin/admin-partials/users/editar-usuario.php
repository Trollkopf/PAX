<form method='post' action='controllers/actualizar-usuario.php'>

	<!--CAMBIAR NOMBRE-->
	<tr class="edit-<?= $usuario->getID(); ?>" hidden>
		<input type="text" id="usertoedit" name="id_usuario" value="<?= $usuario->getID(); ?>" hidden />
		<td colspan="3">Inserte un nuevo nombre de usuario:</td>
		<td colspan="3"><input type="text" id="nuevo_usuario" name="nuevo_usuario" /></td>

		<!--boton formulario-->
		<td rowspan="6" colspan="3"><input type="submit" class="purple" name="cambiar-datos-<?= $usuario->getID(); ?>" id="cambiar-datos" value="CAMBIAR DATOS" /></td>
	</tr>
	<tr class="edit-<?= $usuario->getID(); ?>" hidden>
		<!--CAMBIAR NOMBRE-->
		<td colspan="3">Inserte un nuevo nombre:</td>
		<td colspan="3"><input type="text" id="nuevo_nombre" name="nuevo_nombre" /></td>

		<!--CAMBIAR APELLIDO-->
	<tr class="edit-<?= $usuario->getID(); ?>" hidden>
		<td colspan="3">Inserte un nuevo apellido:</td>
		<td colspan="3"><input type="text" id="nuevo_apellido" name="nuevo_apellido" /></td>
	</tr>

	<!--CAMBIAR CONTRASEÑA-->
	<tr class="edit-<?= $usuario->getID(); ?>" hidden>
		<td colspan="3">Inserte una contraseña nueva:</td>
		<td colspan="3"><input type="text" id="nuevo_password" name="nuevo_password" /></td>
	</tr>

	<!--CAMBIAR EMAIL-->
	<tr class="edit-<?= $usuario->getID(); ?>" hidden>
		<td colspan="3">Inserte un nuevo email:</td>
		<td colspan="3"><input type="text" id="nuevo_email" name="nuevo_email" /></td>
	</tr>

	<!--CAMBIAR TELÉFONO-->
	<tr class="edit-<?= $usuario->getID(); ?>" hidden>
		<td colspan="3">Inserte un nuevo n&uacute;mero de tel&eacute;fono:</td>
		<td colspan="3"><input type="text" id="nuevo_telf" name="nuevo_telf" /></td>
	</tr>

</form>