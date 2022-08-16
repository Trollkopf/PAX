<?php include_once(MODELS_PATH.'appointment.php');
 	  include_once(HELPERS_PATH.'currentuser.php');
 	  include_once(HELPERS_PATH.'now.php');?>
	  
<div class="panel">
<h3>MIS CITAS:</h3>
  	<table border='0' cellpadding='4' cellspacing='2'>
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

	  <?php 
	 	include(HELPERS_PATH.'appointmentsinfo.php'); 
	  	foreach($appointment as $a):?>
	
		<?php $cita = new Appointment($a['ID'], $a['nombre'], $a['apellido'], $a['dia'], $a['mes'], $a['año'], $a['hora'], $a['observaciones']);?>
		<tr>
			<td><?=$cita->getNombre();?></td>
			<td><?=$cita->getApellido();?></td>
			<td><?=$cita->getDia();?></td>
			<td><?=cambiaM_a_espanol($cita->getMes());?></td>
			<td><?=$cita->getAño();?></td>
			<td><?=$cita->getHora();?></td>
			<td><?=$cita->getObs();?></td>
            	
			<!-- INICIAMOS EL CONTROL DE EDICIÓN SEGUN HORAS RESTANTES -->
			<?=$FECHA = $a['fecha'];
			include(HELPERS_PATH.'horasrestantes.php');
			
			if($horasrestantes>=72){
				include(CLIENT_PATH.'client-partials/appointments/botonesCita.php');
				include(CLIENT_PATH.'client-partials/appointments/editar-cita.php');
			}else{echo "<td colspan='2'>FUERA DE PLAZO DE MODIFICACION</td></tr>";}?>		
		</tr>
		
	<?php endforeach; ?>
	
</table>
</div>