<?php 
    include_once('../db/db.php');

	$user = $_POST["user"];
	$appointment = $_POST["datepicker"];
	$hour = $_POST["hour"];
	$observ = $_POST["observ"];	

	$sql = "INSERT INTO citas (usuario, cita, observaciones) VALUES ('".$user."', '".$appointment." ".$hour."', '".$observ."');";

	$results = $mysqli->query($sql);

	if($results){
		Header("Location:../areausuarios.php");		
	}

?>