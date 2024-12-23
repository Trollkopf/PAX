<div class="panel bg-gray-100 p-6 rounded-lg shadow-md">
	<h3 class="text-2xl font-bold text-teal-700 mb-4">PEDIR NUEVA CITA:</h3>

	<form method="post" action="router/router.php" class="space-y-4">
		<!-- Día, Hora, Observaciones y Botón -->
		<div class="grid grid-cols-4 gap-4 items-center">
			<!-- Día -->
			<div>
				<label for="datepicker" class="block text-gray-700 font-medium">Día</label>
				<input type="text" id="datepicker" name="datepicker"
					class="datepicker w-full border border-gray-300 rounded-lg shadow-sm p-2" />
			</div>

			<!-- Hora -->
			<div>
				<label for="hour" class="block text-gray-700 font-medium">Hora</label>
				<select id="hour" name="hour" class="w-full border border-gray-300 rounded-lg shadow-sm p-2">
					<?php include('partials/options-horas.html'); ?>
				</select>
			</div>

			<!-- Observaciones -->
			<div>
				<label for="observ" class="block text-gray-700 font-medium">Observaciones</label>
				<input type="text" id="observ" name="observ" maxlength="50" placeholder="Inserte una breve observación"
					class="w-full border border-gray-300 rounded-lg shadow-sm p-2" />
			</div>

			<input type="hidden" name="action" value="nueva_cita" />

			<!-- Botón Pedir Cita -->
			<div class="flex items-center justify-center">
				<input type="hidden" id="user" name="user" value="<?php echo $curId; ?>" />
				<input type="submit" name="nueva_cita" id="nueva_cita" value="Añadir Cita"
					class="bg-teal-600 text-white px-4 py-2 rounded-lg shadow hover:bg-teal-700 transition" />
			</div>
		</div>

		<!-- Mensaje de error -->
		<div>
			<span id="error" class="text-red-500 font-medium"></span>
		</div>
	</form>
</div>
<script>
	$(document).ready(function () {
		// Configuración del datepicker
		$("#datepicker").datepicker({
			dateFormat: "yy-mm-dd"
		}).change(function () {
			// Habilitar todas las opciones de hora inicialmente
			$("#hour option").prop("disabled", false);

			// Verificar las horas ocupadas para la fecha seleccionada
			let fechaSeleccionada = $(this).val();
			if (fechaSeleccionada) {
				$.ajax({
					type: "POST",
					url: "helpers/validators/validateappointment.php",
					data: { datepicker: fechaSeleccionada },
					dataType: "json",
					success: function (horasOcupadas) {
						// Deshabilitar las horas ocupadas
						horasOcupadas.forEach(hora => {
							$("#hour option[value='" + hora.substring(0, 5) + "']").prop("disabled", true);
						});
					},
					error: function () {
						$("#error").text("Error al validar las horas. Inténtelo de nuevo.");
					}
				});
			}
		});

		// Validación del formulario al enviarlo
		$("form").submit(function (event) {
			let $datepicker = $("#datepicker");
			let $observ = $("#observ");
			let $hour = $("#hour");

			if (!$datepicker.val()) {
				$("#error").text("Debe seleccionar una fecha");
				event.preventDefault();
			} else if ($hour.find(":selected").prop("disabled")) {
				$("#error").text("La hora seleccionada está ocupada");
				event.preventDefault();
			} else if (!$observ.val()) {
				$("#error").text("Debe indicar sus observaciones");
				event.preventDefault();
			}
		});
	});
</script>