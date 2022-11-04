<?php
//BORRAMOS CITAS PASADAS
$dropoldappointments = "DELETE FROM citas WHERE cita < (SELECT NOW());";
$mysqli->query($dropoldappointments);
