<?php 
    include_once('../db/db.php');

	$id = $_POST['id_usuario'];
	$user = $_POST['usuario'];
	
	$drop = "DELETE FROM usuarios WHERE ID=".$id;

	$mysqli->query($drop);
	header('Location: ../../areausuarios.php');
