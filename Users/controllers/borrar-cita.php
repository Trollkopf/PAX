<?php 
    include_once('../db/db.php');

	$id = $_POST['id_cita'];
	
	$drop = "DELETE FROM citas WHERE ID=".$id;

    $mysqli->query($drop);
    header('Location: ../areausuarios.php');			
?>