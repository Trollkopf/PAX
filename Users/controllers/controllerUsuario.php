<?php

// include_once('../db/PDO.php');

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


    /**
     * * CAMBIAR ROL
     * ? Cambia el rol del usuario alternando entre "USER" y "ADMIN" buscando al usuario por su ID
     * @param string $rol
     * @param int $id
     */
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
            header('Location:../areausuarios.php');
        } else {
            $conexion = DB::conn();
            $sentencia = "UPDATE usuarios SET rol = 'USER' WHERE ID=:id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            $consulta->closeCursor();
            $conexion = null;
            header('Location:../areausuarios.php');
        }
    }

    /**
     * * BUSCAR USUARIO POR ID
     * ? Busca todos los datos de un usuario por su ID
     * @param int $id
     * @return array $result
     */
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

    /**
     * * BUSCAR USUARIO
     * ? Busca todos los datos de un usuario por su nombre de usuario
     * @param string $usuario
     * @return array $result
     */
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

    /**
     * * BUSCAR EMAIL
     * ? Busca todos los datos de un usuario por su email
     * @param string $email
     * @return array $result
     */
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

    /**
     * * BUSCAR TELEFONO
     * ? Busca todos los datos de un usuario por su número de teléfono
     * @param string $telefono
     * @return array $result
     */
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
     * @param string $telefono
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

    /**
     * * VER TODOS
     * ? Devuelve todos los datos de la tabla usuarios
     * @return array $result
     */
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

    /**
     * * ACTUALIZAR USUARIO
     * ? Actualiza el nombre de usuario del usuario
     * @param int $id
     * @param string $usuario
     */
    public static function actualizarUsuario($id, $usuario, $nombre, $apellido, $contrasena, $email, $telefono)
    {
        $conexion = DB::conn();

        // ?ACTUALIZAMOS EL NOMBRE DE USUARIO
        if ($usuario != '') {

            $sentencia = "UPDATE usuarios SET usuario = :usuario WHERE ID = :id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":usuario", $usuario);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
        }

        // ? ACTUALIZAMOS EL NOMBRE
        if ($nombre != '') {

            $sentencia = "UPDATE usuarios SET nombre = :nombre WHERE ID = :id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":nombre", $nombre);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
        }

        // ? ACTUALIZAMOS EL APELLIDO
        if ($apellido != '') {

            $sentencia = "UPDATE usuarios SET apellido = :apellido WHERE ID = :id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":apellido", $apellido);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
        }

        // ? ACTUALIZAMOS LA CONTRASEÑA
        if ($contrasena != '') {

            $clave = password_hash($contrasena, PASSWORD_BCRYPT);

            $sentencia = "UPDATE usuarios SET clave = :clave WHERE ID = :id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":clave", $clave);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
        }

        // ? ACTUALIZAMOS EL EMAIL
        if ($email != '') {

            $sentencia = "UPDATE usuarios SET email = :email WHERE ID = :id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":email", $email);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
        }

        // ? ACTUALIZAMOS EL TELEFONO
        if ($telefono != '') {

            $sentencia = "UPDATE usuarios SET telefono = :telefono WHERE ID = :id";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":telefono", $telefono);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
        }

        $consulta->closeCursor();
        $conexion = null;

        header('Location: ../areausuarios.php');
    }

    /**
     * * BORRAR USUARIO
     * ? Elimina los datos de un usuario de la BD
     * @param int $id
     */
    public static function borrarUsuario($id)
    {
        $conexion = DB::conn();
        $sentencia = "DELETE FROM usuarios WHERE ID = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;

        header('Location:../areausuarios.php');
    }
}
