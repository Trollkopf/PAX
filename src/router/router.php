<?php

include_once('../controllers/controllerlogin.php');
include_once('../controllers/controllerCita.php');
include_once('../controllers/controllerProyecto.php');
include_once('../controllers/controllerNoticia.php');
include_once('../controllers/controllerUsuario.php');

// Procesar peticiones POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // var_dump(value: $_POST['action']);

    switch ($action) {
        // **Registro y Login**
        case 'signup':
            handleSignup();
            break;

        case 'login':
            handleLogin();
            break;

        // **Citas**
        case 'nueva_cita':
            handleNuevaCita();
            break;

        case 'editar_cita':
            handleEditarCita();
            break;

        case 'borrar_cita':
            handleBorrarCita();
            break;

        // **Usuarios**
        case 'actualizar_usuario':
            handleActualizarUsuario();
            break;

        case 'cambiar_rol':
            handleCambiarRol();
            break;

        case 'borrar_usuario':
            handleBorrarUsuario();
            break;

        // **Noticias**
        case 'enviar_noticia':
            handleNuevaNoticia();
            break;

        case 'editar_noticia':
            handleEditarNoticia();
            break;

        case 'borrar_noticia':
            handleBorrarNoticia();
            break;

        // **Proyectos**
        case 'crear_proyecto':
            handleCrearProyecto();
            break;

        case 'editar_proyecto':
            handleEditarProyecto();
            break;

        case 'borrar_proyecto':
            handleBorrarProyecto();
            break;

        default:
            http_response_code(400);
            echo json_encode(['error' => 'Acción no válida']);
            break;
    }
}

// **Funciones para manejar acciones**
function handleSignup()
{
    $usuario = htmlspecialchars($_POST['usuario']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $pass = htmlspecialchars($_POST['contrasena']);
    $contrasena = password_hash($pass, PASSWORD_BCRYPT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST['telefono']);

    $ins = new ControllerLogin();
    $ins->nuevoUsuario($usuario, $nombre, $apellido, $contrasena, $email, $telefono);
}

function handleLogin()
{
    $usuario = htmlspecialchars($_POST['usuario']);
    $contrasena = htmlspecialchars($_POST['contrasena']);

    $log = new ControllerLogin();
    $log->login($usuario, $contrasena);
}

function handleNuevaCita()
{
    $usuario = htmlspecialchars($_POST['user']);
    $dia = htmlspecialchars($_POST['datepicker']);
    $hora = htmlspecialchars($_POST['hour']);
    $observaciones = htmlspecialchars($_POST['observ']);
    $cita = "$dia $hora";

    $nuevaCita = new controllerCita();
    $nuevaCita->nuevaCita($usuario, $cita, $observaciones);
}

function handleEditarCita()
{
    $id = htmlspecialchars($_POST['id_cita']);
    $dia = htmlspecialchars($_POST['datepicker']);
    $hora = htmlspecialchars($_POST['hour']);
    $observaciones = htmlspecialchars($_POST['observ']);

    $editarCita = new controllerCita();
    $editarCita->actualizarCita($id, $dia, $hora, $observaciones);
}

function handleBorrarCita()
{
    $id = htmlspecialchars($_POST['id_cita']);

    $borrarCita = new controllerCita();
    $borrarCita->borrarCita($id);
}

function handleActualizarUsuario()
{
    $id = htmlspecialchars($_POST['id_usuario']);
    $usuario = htmlspecialchars($_POST['nuevo_usuario']);
    $nombre = htmlspecialchars($_POST['nuevo_nombre']);
    $apellido = htmlspecialchars($_POST['nuevo_apellido']);
    $contrasena = password_hash($_POST['nuevo_password'], PASSWORD_BCRYPT);
    $email = filter_input(INPUT_POST, 'nuevo_email', FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST['nuevo_telf']);

    $actualizarUsuario = new controllerUsuario();
    $actualizarUsuario->actualizarUsuario($id, $usuario, $nombre, $apellido, $contrasena, $email, $telefono);
}

function handleCambiarRol()
{
    $id = htmlspecialchars($_POST['id_usuario']);
    $rol = htmlspecialchars($_POST['rol_usuario']);

    $cambiarRol = new controllerUsuario();
    $cambiarRol->cambiarRol($rol, $id);
}

function handleBorrarUsuario()
{
    $id = htmlspecialchars($_POST['id_usuario']);

    $borrarUsuario = new controllerUsuario();
    $borrarUsuario->borrarUsuario($id);
}

function handleNuevaNoticia()
{
    $usuario = htmlspecialchars($_POST['id_usuario']);
    $titular = htmlspecialchars($_POST['titular']);
    $categoria = htmlspecialchars($_POST['categoria']);
    $noticia = htmlspecialchars($_POST['noticia']);
    $subtitulo = htmlspecialchars($_POST['subtitulo']);
    $fecha = htmlspecialchars($_POST['curdate']);

    $crearNoticia = new controllerNoticia();
    $crearNoticia->nuevaNoticia($usuario, $titular, $categoria, $noticia, $subtitulo, $fecha);
}

function handleEditarNoticia()
{
    $id = htmlspecialchars($_POST['id']);
    $titular = htmlspecialchars($_POST['titular']);
    $categoria = htmlspecialchars($_POST['categoria']);
    $noticia = htmlspecialchars($_POST['noticia']);
    $subtitulo = htmlspecialchars($_POST['subtitulo']);
    $fecha = htmlspecialchars($_POST['curdate']);

    $editarNoticia = new controllerNoticia();
    $editarNoticia->editarNoticia($id, $titular, $categoria, $noticia, $subtitulo, $fecha);
}

function handleBorrarNoticia()
{
    $id = htmlspecialchars($_POST['id_noticia']);

    $borrarNoticia = new controllerNoticia();
    $borrarNoticia->borrarNoticia($id);
}

function handleCrearProyecto()
{
    $nombre = htmlspecialchars($_POST['nombre_proyecto']);
    $datos = htmlspecialchars($_POST['datos_proyecto']);
    $tecnologias = array_filter([
        $_POST['Html'] ?? '',
        $_POST['Css'] ?? '',
        $_POST['JavaScript'] ?? '',
        $_POST['MySQL'] ?? '',
        $_POST['PHP'] ?? '',
        $_POST['C#'] ?? ''
    ]);
    $tecnologia = implode(', ', $tecnologias);
    $consecucion = htmlspecialchars($_POST['tiempo_consecucion']);
    $imagen = htmlspecialchars($_POST['rutaimagen']);

    $crearProyecto = new controllerProyecto();
    $crearProyecto->crearProyecto($nombre, $datos, $tecnologia, $consecucion, $imagen);
}

function handleEditarProyecto()
{
    $id = htmlspecialchars($_POST['id_proyecto']);
    $nombre = htmlspecialchars($_POST['nombre_proyecto']);
    $datos = htmlspecialchars($_POST['datos_proyecto']);
    $tecnologias = array_filter([
        $_POST['Html'] ?? '',
        $_POST['Css'] ?? '',
        $_POST['JavaScript'] ?? '',
        $_POST['MySQL'] ?? '',
        $_POST['PHP'] ?? '',
        $_POST['C#'] ?? ''
    ]);
    $tecnologia = implode(', ', $tecnologias);
    $consecucion = htmlspecialchars($_POST['tiempo_consecucion']);
    $imagen = htmlspecialchars($_POST['ruta_imagen']);

    $editarProyecto = new controllerProyecto();
    $editarProyecto->editarProyecto($id, $nombre, $datos, $tecnologia, $consecucion, $imagen);
}

function handleBorrarProyecto()
{
    $id = htmlspecialchars($_POST['id_proyecto']);

    $borrarProyecto = new controllerProyecto();
    $borrarProyecto->borrarProyecto($id);
}
