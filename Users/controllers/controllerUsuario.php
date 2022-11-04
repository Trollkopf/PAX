<?php

include_once('../db/PDO.php');

class controllerUsuario
{

    /**
     * * INSERTAR USUARIO
     * ? Inserta un nuevo usuario en la base de datos
     * @param string $usuario 
     * @param string $nombre 
     * @param string $apellido
     * @param string $contrasena
     * @param string $email
     * @param int $telefono
     */

    public static function insertarUsuario($usuario, $nombre, $apellido, $contrasena, $email, $telefono)
    {

        $conexion = DB::conn();
        $sentencia = "INSERT INTO usuarios (usuario, clave, email, telefono, nombre, apellido, rol) VALUES (:usuario, :contrasena, :email, :telefono,:nombre, :apellido,  :rol)";
        $rol = "USER";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":usuario", $usuario);
        $consulta->bindParam(":nombre", $nombre);
        $consulta->bindParam(":apellido", $apellido);
        $consulta->bindParam(":contrasena", $contrasena);
        $consulta->bindParam(":email", $email);
        $consulta->bindParam(":telefono", $telefono);
        $consulta->bindParam(":rol", $rol);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
    }


    public static function cambiarRol($rol, $id)
    {

        if ($rol === 'USER') {
            $conexion = DB::conn();
            $sentencia = "UPDATE usuarios SET rol = 'ADMIN' WHERE ID=:id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            $consulta->closeCursor();
            $conexion = null;
        } else {
            $conexion = DB::conn();
            $sentencia = "UPDATE usuarios SET rol = 'USER' WHERE ID=:id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            $consulta->closeCursor();
            $conexion = null;
        }
    }

    // BUSCAR POR USARIO
    public static function buscarUsuarioID($id)
    {
        $result = [];
        $conexion = DB::conn();
        $sentencia = "SELECT * FROM usuarios WHERE ID = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":id" => $id));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    // BUSCAR POR USARIO
    public static function buscarUsuario($usuario)
    {
        $result = [];
        $conexion = DB::conn();
        $sentencia = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":usuario" => $usuario));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    // BUSCAR POR EMAIL
    public static function buscarEmail($email)
    {
        $result = [];
        $conexion = DB::conn();
        $sentencia = "SELECT * FROM usuarios WHERE email = :email";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":email" => $email));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    // BUSCAR POR TELEFONO
    public static function buscarTelefono($telefono)
    {
        $result = [];
        $conexion = DB::conn();
        $sentencia = "SELECT * FROM usuarios WHERE telefono = :telefono";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":telefono" => $telefono));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    /**
     * * COMPROBAR USUARIO
     * ? Comprueba si en la BD hay algun registro que coincida con usuario, email o teléfono.
     * @param string $usuario
     * @param string $email
     * @param int $telefono
     * ? En caso de que exista algun registro con ellos:
     * @return string "usuario" 
     * @return string "email"
     * @return string "telefono" 
     * ? En caso de no existir registros con ninguna de las búsquedas:
     * @return string "ok" 
     */

    public static function comprobarUsuario($usuario, $email, $telefono)
    {
        $usuarioResult = self::buscarUsuario($usuario);
        $emailResult = self::buscarEmail($email);
        $telefonoResult = self::buscarTelefono($telefono);

        if (count($usuarioResult) === 1) {
            return "usuario";
        } else if (count($emailResult) === 1) {
            return "email";
        } else if (count($telefonoResult) === 1) {
            return "telefono";
        } else {
            return "ok";
        }
    }

    // VER TODOS
    public static function verTodos()
    {
        $result = [];
        $conexion = DB::conn();
        $sentencia = "SELECT * FROM usuarios";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute();
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }


    public static function actualizarNombre($nuevoNombre, $nombre)
    {

        $conexion = DB::conn();
        $sentencia = "UPDATE usuarios SET nombre = :nuevoNombre WHERE nombre = :nombre";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":nuevoNombre", $nuevoNombre);
        $consulta->bindParam(":nombre", $nombre);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
    }

    // BORRAR
    public static function borrar($id)
    {
        $conexion = DB::conn();
        $sentencia = "DELETE FROM usuarios WHERE ID = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
    }
}
