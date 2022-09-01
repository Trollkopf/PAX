<div class='panel'>
	
<h3>PEDIR NUEVA CITA:</h3><br/>
	<table border='0' cellpadding='4' cellspacing='2'>
		
	  	<form method="post" action="controllers/nueva-cita.php">
	  
			<tr>
				<td><b>D&iacute;a</b></td>
				<td><b>Hora</b></td>
				<td><b>Observaciones</b></td>
				<td><b>Pedir Cita</b></td>
			</tr>		  	

				<input type='text' id='user' name='user' value='<?php echo $CURUSER; ?>' hidden/>
				
				<tr>
					<td><input type='text' id='datepicker' class='datepicker' name='datepicker'></td>
				<td>
					<select id='hour' name='hour'>
					<?php include(HELPERS_PATH.'options-horas.html');?>
					</select>
				</td>
				<td><input type='text' id='observ' name='observ' maxlength='50' placeholder='Inserte una breve observaci&oacute;n'/></td>
				<td><input type='submit' name='nueva_cita' id='nueva_cita' class='purple' value='Añadir Cita' /></td>
				</tr>
				<tr><td colspan="4"><span id='error' class='nvaliduser'></span></td></tr>	
				<br/>		
		</form>
	</table>
</div>

<script>

let $datepicker = $("#datepicker");
let $observ = $("#observ");

$("form").submit(function(event) {

	if($datepicker.val().length <= 0){ //COMPROBAMOS QUE SE HA SELECCIONADO UNA FECHA
		$("#error").html("Debe seleccionar una fecha");
		event.preventDefault();
	}else if($("#hour").find(":selected").prop('disabled')){ //COMPROBAMOS QUE LA HORA NO ESTE OCUPADA
		$("#error").html("La hora seleccionada está ocupada");
		event.preventDefault();
	}else if($observ.val().length <= 0){ //COMPROBAMOS QUE HAYAN ESCRITO UNA OBSERVACIÓN
		$("#error").html("Debe indicar sus observaciones");
		event.preventDefault();
	}
});

</script>

