<?php 
    include_once('../db/db.php');

    $ID = $_POST["id_cita"];
    $appointment = $_POST["datepicker"];
	$hour = $_POST["hour"];
	$observ = $_POST["observ"];	

    $update = "UPDATE citas SET cita='".$appointment." ".$hour."', observaciones='".$observ."' WHERE (ID = '".$ID."');";

$mysqli->query($update);

header('Location:../areausuarios.php');