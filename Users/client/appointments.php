<section>
	<?php
	include_once('helpers/cambiaM_a_espanol.php');
	include_once('helpers/borrar-citas-pasadas.php');
	include_once('helpers/now.php'); ?>

	<!--PEDIR NUEVA CITA-->
	<?php include('client/client-partials/appointments/pedirCita.php'); ?>

	<!--ADMINISTRAR CITAS-->
	<?php include('client/client-partials/appointments/misCitas.php'); ?>

</section>