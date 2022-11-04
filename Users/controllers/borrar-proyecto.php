<?php 
include_once('../db/db.php');

	$id = $_POST['id_proyecto'];
	
	$drop = "DELETE FROM proyectos WHERE ID_proyecto=".$id;

	$mysqli->query($drop);

	header('Location: ../areausuarios.php');
