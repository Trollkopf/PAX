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
	<?php endforeach; ?>
</table>
</div>