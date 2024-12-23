<?php

include_once('../db/PDO.php');
include_once('controllerUsuario.php');

class ControllerLogin
{

    /**
     * * NUEVO USUARIO
     * ? Comprueba que el usuario, el email o el telefono no estén registrados. Si no lo está inserta el usuario en la BD e inicia sesión.
     * @param string $usuario
     * @param string $nombre
     * @param string $apellido
     * @param string $contrasena
     * @param string $email
     * @param int $telefono
     */
    public function nuevoUsuario($usuario, $nombre, $apellido, $contrasena, $email, $telefono)
    {

        $result = controllerUsuario::comprobarUsuario($usuario, $email, $telefono);

        switch ($result) {
            case "usuario":
                header('location:../login/signup.php?registro=usuario');
                exit();
                break;
            case "email":
                header('location:../login/signup.php?registro=email');
                exit();
                break;
            case "telefono":
                header('location:../login/signup.php?registro=telefono');
                exit();
                break;
            case "ok":
                controllerUsuario::insertarUsuario($usuario, $nombre, $apellido, $contrasena, $email, $telefono);

                $datos = controllerUsuario::buscarUsuario($usuario);
                session_start();
                $_SESSION['valido'] = "SI";
                $_SESSION['ID'] = $datos[0]->ID;
                $_SESSION['rol'] = $datos[0]->rol;

                header('location:../areausuarios.php');
                break;
        }
    }

    /**
     * * LOGIN
     * ? Logea al usuario
     * @param string $usuario
     * @param string $contrasena
     */
    public function login($usuario, $contrasena)
    {
        $login = $this->comprobarContrasena($usuario, $contrasena);
        if ($login[0]) {
            $id = $login[1];
            $datos = controllerUsuario::buscarUsuarioID($id[0]);
            session_start();
            $_SESSION['valido'] = "SI";
            $_SESSION['ID'] = $datos[0]->ID;
            $_SESSION['rol'] = $datos[0]->rol;

            header('Location: ../areausuarios.php');
        } else {
            header('Location: ../areausuarios.php?usuario=unknown');
        }
    }

    /**
     * * COMPROBAR CONTRASEÑA
     * ? Comprueba que usuario y contraseña sean correctos, en caso de que coincida devuelve true
     * @param string $usuario
     * @param string $contrasena
     * @return bool $found
     */
    public function comprobarContrasena($usuario, $contrasena)
    {
        $found = false;
        $datos = controllerUsuario::buscarUsuario($usuario);
        if (count($datos) === 1) {
            if ($usuario === $datos[0]->usuario && password_verify($contrasena, $datos[0]->clave)) {
                $found = true;
            }
            return [$found, [$datos[0]->ID]];
        }
    }
}
