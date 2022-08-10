<!-- TODO: BOTON EDITAR CORRECTO -->
<!-- <td><input type='text' id='id_cita' name='id_cita' value='<?=$cita->getID();?>' hidden/>		
<button type='submit' class='red' id='borrar-<?=$cita->getID();?>' name='borrar' value='' onclick="return confirm('¿Realmente desea borrar la cita?')">
	<?php include (PARTIALS_PATH.'boton-borrar.html');?></button></td> -->
<td><input type='text' id='id_cita' name='id_cita' value='<?=$cita->getID();?>' hidden/>		
	<button type='submit' class='red' id='borrar-<?=$cita->getID();?>' name='borrar' value='' onclick="return confirm('¿Realmente desea borrar la cita?')">
	<?php include (PARTIALS_PATH.'boton-borrar.html');?></button></td>
