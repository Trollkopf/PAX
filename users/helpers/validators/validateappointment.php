<?php 
	include_once('../../db/db.php');

$appointment=$_POST["datepicker"];
$horas = ['10:00', '11:00', '12:00', '13:00', '16:00', '17:00', '18:00', '19:00'];

$sql="SELECT DATE_FORMAT(cita, '%T') AS hora FROM citas WHERE (cita ='".$appointment." ".implode("') OR (cita ='".$appointment." ", $horas)."');";

$dispo=$mysqli->query($sql);

$result = [];

		while($registro = mysqli_fetch_assoc($dispo)){

			array_push($result, $registro['hora']);
		};

	echo json_encode($result);
