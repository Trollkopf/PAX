<?php

// include_once('../db/PDO.php');

class controllerCita
{

    /**
     * * NUEVA CITA
     * ? Inserta una cita en la BD y la enlaza al usuario que la solicitó
     * @param string $usuario
     * @param string $dia
     * @param string $hora
     * @param string $observaciones
     */
    public function nuevaCita($usuario, $cita, $observaciones)
    {

        $conexion = DB::conn();
        $sentencia = "INSERT INTO citas (usuario, cita, observaciones) VALUES (:usuario, :cita, :observaciones);";

        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":usuario", $usuario);
        $consulta->bindParam(":cita", $cita);
        $consulta->bindParam(":observaciones", $observaciones);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        header('Location: ../areausuarios.php');
    }

    /**
     * * ACTUALIZAR CITA
     * ? Sobreescribe la cita usando la ID para localizarla. Actualiza fecha, hora y observaciones
     * @param int $id
     * @param string $dia
     * @param string $hora
     * @param string $observaciones
     */
    public function actualizarCita($id, $dia, $hora, $observaciones)
    {
        $cita = $dia . " " . $hora;

        $conexion = DB::conn();
        $sentencia = "UPDATE citas SET cita=:cita, observaciones=:observaciones WHERE ID=:id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->bindParam(":cita", $cita);
        $consulta->bindParam(":observaciones", $observaciones);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        header('Location: ../areausuarios.php');
    }

    /**
     * * BORRAR CITA
     * ? Borra una cita de la base de datos buscándola por la ID de la cita
     * @param int $id
     */
    public function borrarCita($id)
    {
        $conexion = DB::conn();
        $sentencia = "DELETE FROM citas WHERE ID=:id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        header('Location: ../areausuarios.php');
    }
}
