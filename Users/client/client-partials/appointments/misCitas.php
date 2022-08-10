<div class="panel">
<h3>MIS CITAS:</h3>
  	<table border='0' cellpadding='4' cellspacing='2'>
  	<?php echo '<input type="text" id="currentuser" name="currentuser" value="'.$usertoedit.'" hidden/>' ?>
			<tr>
				<td><b>Nombre</b></td>
				<td><b>Apellido</b></td>
				<td><b>D&iacute;a</b></td>
				<td><b>Mes</b></td>
				<td><b>A&ntilde;o</b></td>
				<td><b>Hora</b></td>
				<td><b>Observaciones</b></td>
				<td colspan="2"><b>Administrar Cita</b></td>
			</tr>

  <?php
  	$currentuser = $_SESSION['user']; 

  	//OBTENEMOS EL MOMENTO EXACTO PARA LIMITAR LA MODIFICACIÓN DE RESERVAS
  	$sql_now = "SELECT NOW() AS NOW;";
		$now=$mysqli->query($sql_now);
		while($registro = mysqli_fetch_assoc($now)){
		$NOW = $registro['NOW'];}      
    
    //OBTENEMOS LA INFORMACIÓN NECESARIA DE LAS CITAS
    $sql_usuarios ="SELECT ci.ID, us.nombre , us.apellido , ci.cita AS 'fecha', DATE_FORMAT(ci.cita, '%d') AS 'dia', DATE_FORMAT(ci.cita, '%M') AS 'mes', DATE_FORMAT(ci.cita, '%Y') AS 'año', DATE_FORMAT(ci.cita, '%T') AS 'hora', ci.observaciones AS observaciones FROM citas ci INNER JOIN usuarios us ON ci.usuario = us.ID WHERE us.usuario ='".$currentuser."' ORDER BY ci.cita ASC;";
    
    $usuarios=$mysqli->query($sql_usuarios);
    
    while($registro = mysqli_fetch_assoc($usuarios)){
            	$ID = $registro['ID'];
            	$FECHA = $registro['fecha'];

            	$sql_horastotales = "SELECT TIMESTAMPDIFF(HOUR, '".$NOW."', '".$FECHA."') AS horas;";
							$horas=$mysqli->query($sql_horastotales);
							while($rg = mysqli_fetch_assoc($horas)){
							$HORASTOTALES = $rg['horas'];}   

			echo "
					<tr>
					<td>".$registro['nombre']."</td>
					<td>".$registro['apellido']."</td>
					<td>".$registro['dia']."</td>
					<td>".cambiaM_a_espanol($registro['mes'])."</td>
					<td>".$registro['año']."</td>
					<td>".$registro['hora']."</td>
					<td>".$registro['observaciones']."</td>";

			//COMPROBAMOS SI LA FECHA ES MENOR A 72 HORAS PARA QUITAR LOS BOTONES 
			if($HORASTOTALES>=72){
			echo "
			<!--INICIAMOS FORMULARIO MODIFICAR DATOS CITA-->
					<form method='post' action='TODO:.back/.CLIENT/__editappointments.php'>

			<!--CAPTURAMOS INFORMACION DE LA LINEA-->
					<td><input type='text' id='id_cita' name='id_cita' value='".$ID."' hidden/>
							  
			<!--BOTON-->
					<button type='submit' class='edit' id='editar_cita' name='editar_cita' value='' />
					<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='16' height='16' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
				  	<path stroke='none' d='M0 0h24v24H0z' fill='none'/>
				  	<path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1' />
				  	<path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z' />
				  	<path d='M16 5l3 3' />
					</svg>
					</button></td>
				</form>

			<!--INICIAMOS FORMULARIO BORRAR CITA-->
					<form method='post' action=TODO:'.back/.CLIENT/deleteappointment.php'>

			<!--CAPTURAMOS INFORMACION DE LA LINEA-->
					<td><input type='text' id='id_cita' name='id_cita' value='".$ID."' hidden/>
							  
<!--BOTON-->
					<button type='submit' class='red' id='borrar_usuario' name='borrar_usuario' value=''>  
					<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
					</svg>
					</button></td></tr>
					</form>";}else{
						echo "<td colspan='2'>FUERA DE PLAZO DE MODIFICACION</td></tr>";}}
	?><br/>
</table>
</div>