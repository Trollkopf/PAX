<section>
	<?php
		include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
		include_once(HELPERS_PATH.'cambiaM_a_espanol.php');
		include_once(HELPERS_PATH.'selectcurrentuserinfo.php');
		include_once(HELPERS_PATH.'borrar-citas-pasadas.php');
		include_once(HELPERS_PATH.'now.php');?>

<!--PEDIR NUEVA CITA-->
	<?php include(CLIENT_PATH.'client-partials/appointments/pedirCita.php');?>
   
<!--ADMINISTRAR CITAS-->  
	<?php include(CLIENT_PATH.'client-partials/appointments/misCitas.php');?>

</section>