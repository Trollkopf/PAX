<td><input type='text' id='id_cita' name='id_cita' value='<?= $cita->getID(); ?>' hidden />
	<button type='submit' class='edit' id='editar-<?= $cita->getID(); ?>' name='cambiar-datos' />
	<?php include('partials/boton-editar.html'); ?></button>
</td>

<script>
	$('#editar-<?= $cita->getID(); ?>').click(function() {
		$('.edit-<?= $cita->getID(); ?>').toggle();
		return false;
	});
</script>

<form method="POST" action="router/router.php">
	<td><input type='text' id='id_cita' name='id_cita' value='<?= $cita->getID(); ?>' hidden />
		<button type='submit' class='red' id='borrar-<?= $cita->getID(); ?>' name='borrar_cita' value='BORRAR' onclick="return confirm('¿Realmente desea borrar la cita?')">
			<?php include('partials/boton-borrar.html'); ?></button>
	</td>
</form>