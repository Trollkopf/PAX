
<td><input type='text' id='id_cita' name='id_cita' value='<?=$cita->getID();?>' hidden/>		
<button type='submit' class='edit' id='editar-<?=$cita->getID();?>' name='editar'/>
	<?php include ('partials/boton-editar.html');?></button></td>
	
	<script>
	$('#editar-<?=$cita->getID();?>').click(function(){					
		$('.edit-<?=$cita->getID();?>').toggle();
		return false;});
	</script>

<form method="POST" action="controllers/borrar-cita.php">
<td><input type='text' id='id_cita' name='id_cita' value='<?=$cita->getID();?>' hidden/>		
	<button type='submit' class='red' id='borrar-<?=$cita->getID();?>' name='borrar' value='' onclick="return confirm('¿Realmente desea borrar la cita?')">
	<?php include ('partials/boton-borrar.html');?></button></td></form>
