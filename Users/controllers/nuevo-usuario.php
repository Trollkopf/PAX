<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(DB_PATH.'db.php');

	$pass = password_hash($_POST["password"], PASSWORD_BCRYPT);
	$user = $_POST["user"];
	$email = $_POST["email"];
	$telf = $_POST["telf"];
	$name = $_POST["name"];
	$surname = $_POST["surname"];

	$sql = "INSERT INTO usuarios (usuario, clave, email, telefono, nombre, apellido, rol) VALUES ('".$user."', '".$pass."', '".$email."', '".$telf."','".$name."', '".$surname."',  'USER')";

	$rs = $mysqli->query($sql);

	if($rs){
		Header('Location:../areausuarios.php');	
	}
?>