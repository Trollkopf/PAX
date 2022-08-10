<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(DB_PATH.'db.php');

	$id = $_POST['id_usuario'];
	$user = $_POST['usuario'];
	
	$drop = "DELETE FROM usuarios WHERE ID=".$id;

	$mysqli->query($drop);
	header('Location: ../../areausuarios.php');
?>