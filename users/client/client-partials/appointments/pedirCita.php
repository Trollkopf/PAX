<div class='panel'>

	<h3>PEDIR NUEVA CITA:</h3><br />
	<table border='0' cellpadding='4' cellspacing='2'>

		<form method="post" action="router/router.php">

			<tr>
				<td><b>D&iacute;a</b></td>
				<td><b>Hora</b></td>
				<td><b>Observaciones</b></td>
				<td><b>Pedir Cita</b></td>
			</tr>

			<input type='text' id='user' name='user' value='<?php echo $curId; ?>' hidden />

			<tr>
				<td><input type='text' id='datepicker' class='datepicker' name='datepicker'></td>
				<td>
					<select id='hour' name='hour'>
						<?php include('partials/options-horas.html'); ?>
					</select>
				</td>
				<td><input type='text' id='observ' name='observ' maxlength='50' placeholder='Inserte una breve observaci&oacute;n' /></td>
				<td><input type='submit' name='nueva_cita' id='nueva_cita' class='purple' value='Añadir Cita' /></td>
			</tr>
			<tr>
				<td colspan="4"><span id='error' class='nvaliduser'></span></td>
			</tr>
			<br />
		</form>
	</table>
</div>


<script>
	$(document).ready(function() {
		$("#datepicker").change(function() {

			/*ACTIVAMOS TODAS LAS HORAS*/
			$("#hour option[value='10:00']").attr("disabled", false);
			$("#hour option[value='11:00']").attr("disabled", false);
			$("#hour option[value='12:00']").attr("disabled", false);
			$("#hour option[value='13:00']").attr("disabled", false);
			$("#hour option[value='16:00']").attr("disabled", false);
			$("#hour option[value='17:00']").attr("disabled", false);
			$("#hour option[value='18:00']").attr("disabled", false);
			$("#hour option[value='19:00']").attr("disabled", false);

		});

		/*CREAMOS LA FUNCION PARA DESHABILITAR TODAS LAS HORAS RESERVADAS*/
		var datos = 'datepicker=' + $("#datepicker").val();
		var url = "helpers/validators/validateappointment.php";
		var dataType = "html";

		$.ajax({
			type: "POST",
			url: url,
			data: datos,

			success: function(data) {
				var vectorObj = JSON.parse(data);
				var vlength = vectorObj.length;

				let i = 0;

				while (i < vlength) {
					switch (vectorObj[i]) {
						case "10:00:00":
							$("#hour option[value='10:00']").attr("disabled", true);
							break;
						case "11:00:00":
							$("#hour option[value='11:00']").attr("disabled", true);
							break;
						case "12:00:00":
							$("#hour option[value='12:00']").attr("disabled", true);
							break;
						case "13:00:00":
							$("#hour option[value='13:00']").attr("disabled", true);
							break;
						case "16:00:00":
							$("#hour option[value='16:00']").attr("disabled", true);
							break;
						case "17:00:00":
							$("#hour option[value='17:00']").attr("disabled", true);
							break;
						case "18:00:00":
							$("#hour option[value='18:00']").attr("disabled", true);
							break;
						case "19:00:00":
							$("#hour option[value='19:00']").attr("disabled", true);
							break;
					}
					i++;
				}
			},
		});
	});

	let $datepicker = $("#datepicker");
	let $observ = $("#observ");

	$("form").submit(function(event) {

		if ($datepicker.val().length <= 0) { //COMPROBAMOS QUE SE HA SELECCIONADO UNA FECHA
			$("#error").html("Debe seleccionar una fecha");
			event.preventDefault();
		} else if ($("#hour").find(":selected").prop('disabled')) { //COMPROBAMOS QUE LA HORA NO ESTE OCUPADA
			$("#error").html("La hora seleccionada está ocupada");
			event.preventDefault();
		} else if ($observ.val().length <= 0) { //COMPROBAMOS QUE HAYAN ESCRITO UNA OBSERVACIÓN
			$("#error").html("Debe indicar sus observaciones");
			event.preventDefault();
		}
	});
</script>