<?php

include_once('../controllers/controllerlogin.php');
include_once('../controllers/controllerCita.php');
include_once('../controllers/controllerProyecto.php');
include_once('../controllers/controllerNoticia.php');


// * REGISTRO Y LOGIN
// ! REGISTRO
if ($_POST['signup']) {

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
}

//! LOGIN
if ($_POST['login']) {
	$usuario = htmlspecialchars($_POST['usuario']);
	$contrasena = htmlspecialchars($_POST['contrasena']);

	$log = new ControllerLogin();
	$log->login($usuario, $contrasena);
	unset($log);
}

// * RUTAS A LAS CITAS
// ! NUEVA CITA
if ($_POST['nueva_cita']) {

	$usuario = $_POST["user"];
	$dia = $_POST["datepicker"];
	$hora = $_POST["hour"];
	$observaciones = $_POST["observ"];

	$cita = $dia . " " . $hora;

	$nuevaCita = new controllerCita();
	$nuevaCita->nuevaCita($usuario, $cita, $observaciones);
	unset($nuevaCita);
}

// ! EDITAR CITA
if ($_POST['editar_cita']) {
	$id = $_POST["id_cita"];
	$dia = $_POST["datepicker"];
	$hora = $_POST["hour"];
	$observaciones = $_POST["observ"];

	$editarCita = new controllerCita();
	$editarCita->actualizarCita($id, $dia, $hora, $observaciones);
	unset($editarCita);
}

// ! BORRAR CITA
if ($_POST['borrar_cita']) {
	$id = $_POST['id_cita'];

	$borrarCita = new controllerCita();
	$borrarCita->borrarCita($id);
	unset($borrarCita);
}

// * RUTAS USUARIO
// ! ACTUALIZAR USUARIO
if ($_POST['actualizar_usuario']) {
	$id = $_POST['id_usuario'];

	$usuario = $_POST['nuevo_usuario'];
	$nombre = $_POST['nuevo_nombre'];
	$apellido = $_POST['nuevo_apellido'];
	$contrasena = $_POST['nuevo_password'];
	$email = $_POST['nuevo_email'];
	$telefono = $_POST['nuevo_telf'];

	$actualizarUsuario = new controllerUsuario();
	$actualizarUsuario->actualizarUsuario($id, $usuario, $nombre, $apellido, $contrasena, $email, $telefono);
	unset($actualizarUsuario);
}

// ! CAMBIAR ROL
if ($_POST['cambiar_rol']) {
	$id = $_POST['id_usuario'];
	$rol = $_POST['rol_usuario'];

	$cambiarRol = new controllerUsuario();
	$cambiarRol->cambiarRol($rol, $id);
	unset($cambiarRol);
}

// ! BORRAR USUARIO
if ($_POST['borrar_usuario']) {
	$id = $_POST['id_usuario'];

	$borrarUsuario = new controllerUsuario();
	$borrarUsuario->borrarUsuario($id);
	unset($borrarUsuario);
}

// * RUTAS NOTICIAS
// ! CREAR NOTICIA
if ($_POST['enviar_noticia']) {
	$usuario = $_POST['id_usuario'];
	$titular = $_POST['titular'];
	$categoria = $_POST['categoria'];
	$noticia = $_POST['noticia'];
	$subtitulo = $_POST['subtitulo'];
	$fecha = $_POST['curdate'];

	$crearNoticia = new controllerNoticia();
	$crearNoticia->nuevaNoticia($usuario, $titular, $categoria, $noticia, $subtitulo, $fecha);
	unset($crearNoticia);
}

// ! EDITAR NOTICIA
if ($_POST['editar_noticia']) {
	$id = $_POST['id'];
	$titular = $_POST['titular'];
	$categoria = $_POST['categoria'];
	$noticia = $_POST['noticia'];
	$subtitulo = $_POST['subtitulo'];
	$fecha = $_POST['curdate'];

	$editarNoticia = new controllerNoticia();
	$editarNoticia->editarNoticia($id, $titular, $categoria, $noticia, $subtitulo, $fecha);
	unset($editarNoticia);
}

// ! BORRAR Noticia
if ($_POST['borrar_noticia']) {
	$id = $_POST['id_noticia'];

	$borrarNoticia = new controllerNoticia();
	$borrarNoticia->borrarNoticia($id);
	unset($borrarNoticia);
}

// * RUTAS PROYECTOS

// ! CREAR PROYECTO
if ($_POST['crear_proyecto']) {

	$nombre = $_POST['nombre_proyecto'];
	$datos = $_POST['datos_proyecto'];

	$html = $_POST['Html'];
	$css = $_POST['Css'];
	$js = $_POST['JavaScript'];
	$mysql = $_POST['MySQL'];
	$php = $_POST['PHP'];
	$csharp = $_POST['C#'];

	$consecucion = $_POST['tiempo_consecucion'];
	$imagen = $_POST['rutaimagen'];

	// ? SECUENCIA PARA AÑADIR LAS TECNOLOGÍAS
	// ? HTML
	if ($html != "") {
		$tecnologia = $tecnologia . $html;
	}

	// ? CSS
	if ($css != "") {
		if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $css;

	// ? JAVASCRIPT
	if ($js != "") {
		if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $js;

	// ? MYSQL
	if ($mysql != "") {
		if ($js != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $mysql;

	// ? PHP
	if ($php != "") {
		if ($mysql != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($js != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $php;

	// ? C#
	if ($csharp != "") {
		if ($php != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($mysql != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($js != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $csharp;

	$crearProyecto = new controllerProyecto();
	$crearProyecto->crearProyecto($nombre, $datos, $tecnologia, $consecucion, $imagen);
	unset($crearProyecto);
}

// ! EDITAR PROYECTO
if ($_POST['editar_proyecto']) {

	$nombre = $_POST['nombre_proyecto'];
	$datos = $_POST['datos_proyecto'];
	$id = $_POST['id_proyecto'];

	$tecnologia = "";
	$html = $_POST['Html'];
	$css = $_POST['Css'];
	$js = $_POST['JavaScript'];
	$mysql = $_POST['MySQL'];
	$php = $_POST['PHP'];
	$csharp = $_POST['C#'];

	$consecucion = $_POST['tiempo_consecucion'];
	$imagen = $_POST['ruta_imagen'];

	// ? SECUENCIA PARA AÑADIR LAS TECNOLOGÍAS
	// ? HTML
	if ($html != "") {
		$tecnologia = $tecnologia . $html;
	}

	// ? CSS
	if ($css != "") {
		if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $css;

	// ? JAVASCRIPT
	if ($js != "") {
		if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $js;

	// ? MYSQL
	if ($mysql != "") {
		if ($js != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $mysql;

	// ? PHP
	if ($php != "") {
		if ($mysql != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($js != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $php;

	// ? C#
	if ($csharp != "") {
		if ($php != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($mysql != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($js != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($css != "") {
			$tecnologia = $tecnologia . ", ";
		} else if ($html != "") {
			$tecnologia = $tecnologia . ", ";
		}
	}
	$tecnologia = $tecnologia . $csharp;

	$editarProyecto = new controllerProyecto();
	$editarProyecto->editarProyecto($id, $nombre, $datos, $tecnologia, $consecucion, $imagen);
	unset($editarProyecto);
}

// ! BORRAR PROYECTO
if ($_POST['borrar_proyecto']) {
	$id = $_POST['id_proyecto'];

	$borrarProyecto = new controllerProyecto();
	$borrarProyecto->borrarProyecto($id);
	unset($borrarProyecto);
}
