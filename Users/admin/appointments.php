<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(HELPERS_PATH.'cambiaM_a_espanol.php'); 
	include_once(HELPERS_PATH.'appointmentsinfo.php'); 
	include_once(MODELS_PATH.'appointment.php'); 
	include_once(HELPERS_PATH.'borrar-citas-pasadas.php');?>
?>

<div class='panel'>

<h3>CITAS:</h3>
<table border='0' cellpadding='4' cellspacing='2'>
	<tr>
	<td><b>Nombre</b></td>
	<td><b>Apellido</b></td>
	<td><b>D&iacute;a</b></td>
	<td><b>Mes</b></td>
	<td><b>A&ntilde;o</b></td>
	<td><b>Hora</b></td>
	<td><b>Observaciones</b></td>
	<td><b>Eliminar Cita</b></td>
	</tr>

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
		<!--BORRAR CITA-->
		<form method='post' action='controllers/borrar-cita.php'>
		<td><input type='text' id='id_cita' name='id_cita' value='<?=$cita->getID();?>' hidden/>		
		<button type='submit' class='red' id='borrar-<?=$cita->getID();?>' name='borrar' value='' onclick="return confirm('¿Realmente desea borrar la cita?')">
		<?php include (PARTIALS_PATH.'boton-borrar.html');?></button></td></form>
	</tr>
<?php endforeach; ?>
</table>
</div>