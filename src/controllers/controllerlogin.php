<?php

include_once('../db/PDO.php');
include_once('controllerUsuario.php');

class ControllerLogin
{
    /**
     * * NUEVO USUARIO
     * Verifica que el usuario, email o teléfono no estén registrados. Si no lo están, inserta el usuario en la base de datos e inicia sesión.
     * @param string $usuario
     * @param string $nombre
     * @param string $apellido
     * @param string $contrasena
     * @param string $email
     * @param int $telefono
     */
    public function nuevoUsuario($usuario, $nombre, $apellido, $contrasena, $email, $telefono)
    {
        try {
            $result = controllerUsuario::comprobarUsuario($usuario, $email, $telefono);

            switch ($result) {
                case "usuario":
                    header('Location: ../login/signup.php?registro=usuario');
                    exit();

                case "email":
                    header('Location: ../login/signup.php?registro=email');
                    exit();

                case "telefono":
                    header('Location: ../login/signup.php?registro=telefono');
                    exit();

                case "ok":
                    controllerUsuario::insertarUsuario($usuario, $nombre, $apellido, $contrasena, $email, $telefono);

                    $datos = controllerUsuario::buscarUsuario($usuario);
                    if (!$datos || count($datos) === 0) {
                        throw new Exception("Error al buscar el usuario recién creado.");
                    }

                    // Iniciar sesión
                    session_start();
                    $_SESSION['valido'] = "SI";
                    $_SESSION['ID'] = $datos[0]->ID;
                    $_SESSION['rol'] = $datos[0]->rol;

                    header('Location: ../areausuarios.php');
                    exit();

                default:
                    throw new Exception("Estado desconocido al verificar usuario: $result");
            }
        } catch (Exception $e) {
            error_log("Error en nuevoUsuario: " . $e->getMessage());
            header('Location: ../login/signup.php?registro=error');
            exit();
        }
    }

    /**
     * * LOGIN
     * Logea al usuario.
     * @param string $usuario
     * @param string $contrasena
     */
    public function login($usuario, $contrasena)
    {
        try {
            $login = $this->comprobarContrasena($usuario, $contrasena);
            if ($login[0]) {
                $id = $login[1];
                $datos = controllerUsuario::buscarUsuarioID($id[0]);

                if (!$datos || count($datos) === 0) {
                    throw new Exception("Error al obtener datos del usuario con ID: $id[0]");
                }

                // Iniciar sesión
                session_start();
                $_SESSION['valido'] = "SI";
                $_SESSION['ID'] = $datos[0]->ID;
                $_SESSION['rol'] = $datos[0]->rol;

                header('Location: ../areausuarios.php');
                exit();
            } else {
                header('Location: ../areausuarios.php?error=unknown');
                exit();
            }
        } catch (Exception $e) {
            error_log("Error en login: " . $e->getMessage());
            header('Location: ../areausuarios.php?error=error');
            exit();
        }
    }

    /**
     * * COMPROBAR CONTRASEÑA
     * Verifica si usuario y contraseña son correctos. Si coinciden, retorna true junto con el ID del usuario.
     * @param string $usuario
     * @param string $contrasena
     * @return array [bool $found, array $userId]
     */
    public function comprobarContrasena($usuario, $contrasena)
    {
        try {
            $found = false;
            $datos = controllerUsuario::buscarUsuario($usuario);

            if (count($datos) === 1) {
                if ($usuario === $datos[0]->usuario && password_verify($contrasena, $datos[0]->clave)) {
                    $found = true;
                }
                return [$found, [$datos[0]->ID]];
            }

            return [$found, []];
        } catch (Exception $e) {
            error_log("Error en comprobarContrasena: " . $e->getMessage());
            return [false, []];
        }
    }
}
