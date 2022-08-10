<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
//INCLUIMOS CREDENCIALES PARA CONECTAR CON LA BD
include_once(DB_PATH.'.env.php');

//ESTABLECEMOS CONEXIÓN
$mysqli = new mysqli(SERVIDOR, USUARIO, PASSWORD, BD);

	if($mysqli->connect_errno){
		echo "Error al conectar a la base de datos <br/>";
	}

?>