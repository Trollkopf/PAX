<?php 
	include_once('../db/db.php');

	$rol = $_POST['rol_usuario'];
	$id = $_POST['id_usuario'];

	if($rol === 'USER'){
		$update = "UPDATE usuarios SET rol = 'ADMIN' WHERE ID=".$id;
		$mysqli->query($update);
	}else{
		$update = "UPDATE usuarios SET rol = 'USER' WHERE ID=".$id;
		$mysqli->query($update);
    }	
	
	header('Location:../areausuarios.php');
