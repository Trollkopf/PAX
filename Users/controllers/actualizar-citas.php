<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include(DB_PATH.'db.php');

    $ID = $_POST["id_cita"];
    $appointment = $_POST["fecha"];
	$hour = $_POST["hour"];
	$observ = $_POST["observ"];	

    $update = "UPDATE citas SET cita='".$appointment." ".$hour."', observaciones='".$observ."' WHERE (ID = '".$ID."');";

$mysqli->query($update);

header('Location:../areausuarios.php');