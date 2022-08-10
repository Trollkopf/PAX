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

				<input type='text' id='user' name='user' value='<?php echo $usertoedit; ?>' hidden/>
				
				<tr>
					<td><input type='text' id='datepicker' name='datepicker'></td>
				<td>
					<select id='hour' name='hour'>
					<option value='10:00'>10:00</option>
					<option value='11:00'>11:00</option>
					<option value='12:00'>12:00</option>
					<option value='13:00'>13:00</option>
					<option value='16:00'>16:00</option>
					<option value='17:00'>17:00</option>
					<option value='18:00'>18:00</option>
					<option value='19:00'>19:00</option>
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
	}else{}
});

</script>