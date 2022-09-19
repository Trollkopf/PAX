<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once(DB_PATH.'db.php');

	$id = $_POST['id_proyecto'];
	
	$drop = "DELETE FROM proyectos WHERE ID_proyecto=".$id;

	$mysqli->query($drop);

	header('Location: ../areausuarios.php');
?>