<?php

include_once('../controllers/controllerLogin.php');

if($_POST['signup']){


	$usuario = htmlspecialchars($_POST['usuario']);
	$nombre = ($_POST["nombre"]);
	$apellido = ($_POST["apellido"]);
	$pass = htmlspecialchars($_POST['contrasena']);
	$contrasena = password_hash($pass, PASSWORD_BCRYPT);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$telefono = ($_POST["telefono"]);
	
    $ins = new ControllerLogin();
    $ins->nuevoUsuario($usuario, $nombre, $apellido, $contrasena, $email, $telefono);
    unset($ins);
    $password = password_hash($pass, PASSWORD_BCRYPT);
}

if($_POST['login']){
	$usuario = htmlspecialchars($_POST['usuario']);
	$contrasena = htmlspecialchars($_POST['contrasena']);

	$log = new ControllerLogin();
	$log->login($usuario, $contrasena);
	unset($log);
}