<div class="panel">
<h3>MIS CITAS:</h3>
  	<table border='0' cellpadding='4' cellspacing='2'>
  	<?php echo '<input type="text" id="currentuser" name="currentuser" value="'.$usertoedit.'" hidden/>' ?>
			<tr>
				<td rowspan="2"><b>Nombre</b></td>
				<td rowspan="2"><b>Apellido</b></td>
				<td rowspan="2"><b>D&iacute;a</b></td>
				<td rowspan="2"><b>Mes</b></td>
				<td rowspan="2"><b>A&ntilde;o</b></td>
				<td rowspan="2"><b>Hora</b></td>
				<td rowspan="2"><b>Observaciones</b></td>
				<td colspan="2"><b>Administrar Cita</b></td>
			</tr>
			<tr>
				<td><b>Editar</b></td>
				<td><b>Borrar</b></td>
			</tr>

  <?php $currentuser = $_SESSION['user']; ?>

	  <?php foreach($result as $r):?>
	
		<?php $cita = new Appointment($r['ID'], $r['nombre'], $r['apellido'], $r['dia'], $r['mes'], $r['año'], $r['hora'], $r['observaciones']);?>
		<tr>
			<td><?=$cita->getNombre();?></td>
			<td><?=$cita->getApellido();?></td>
			<td><?=$cita->getDia();?></td>
			<td><?=cambiaM_a_espanol($cita->getMes());?></td>
			<td><?=$cita->getAño();?></td>
			<td><?=$cita->getHora();?></td>
			<td><?=$cita->getObs();?></td>
            	   
			<?=include(HELPERS_PATH.'horasrestantes.php');

			TODO:
			
			if($horasrestantes>=72){
				include(CLIENT_PATH.'client-partials/appointments/botonesCita.php');
			}else{echo "<td colspan='2'>FUERA DE PLAZO DE MODIFICACION</td></tr>";}?>
		</tr>
		<br/>
		<!-- FORMULARIO DE EDITAR CITA -->
		<form method="POST" action="controllers/actualizar-citas.php">
			<tr class="edit-<?=$usuario->getID();?>" hidden>
				<td colspan="5"><input type='text' id='datepicker' name='datepicker'></td>
				<td><select id='hour-<?=$usuario->getID();?>' name='hour'>
					<option value='10:00'>10:00</option>
					<option value='11:00'>11:00</option>
					<option value='12:00'>12:00</option>
					<option value='13:00'>13:00</option>
					<option value='16:00'>16:00</option>
					<option value='17:00'>17:00</option>
					<option value='18:00'>18:00</option>
					<option value='19:00'>19:00</option></td>
				<td></td>
				<td colspan="2"><td rowspan="6" colspan="3"><input type="submit" class="purple" name="cambiar-datos-<?=$cita->getID();?>" id="cambiar-datos" value="CAMBIAR DATOS"/></td></td>
			</tr>
			<tr class="edit-<?=$usuario->getID();?>" hidden>
			<td colspan="7" id="error-<?=$usuario->getID();?>"></td>
			</tr>
			<script>
			$("form").submit(function(event) {
				if($datepicker.val().length <= 0){ //COMPROBAMOS QUE SE HA SELECCIONADO UNA FECHA
					$("#error-<?=$usuario->getID();?>").html("Debe seleccionar una fecha");
					event.preventDefault();
				}else if($("#hour-<?=$usuario->getID();?>").find(":selected").prop('disabled')){ //COMPROBAMOS QUE LA HORA NO ESTE OCUPADA
					$("#error-<?=$usuario->getID();?>").html("La hora seleccionada está ocupada");
					event.preventDefault();
				}else if($observ.val().length <= 0){ //COMPROBAMOS QUE HAYAN ESCRITO UNA OBSERVACIÓN
					$("#error-<?=$usuario->getID();?>").html("Debe indicar sus observaciones");
					event.preventDefault();
				}else{}
				});
			</script>
		</form>
	<?php endforeach; ?>
</table>
</div>