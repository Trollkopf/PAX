<?php

// include_once('../db/PDO.php');

class controllerCita
{
    /**
     * * NUEVA CITA
     * Inserta una cita en la base de datos y la enlaza al usuario que la solicitó.
     * @param string $usuario Usuario que solicita la cita.
     * @param string $cita Fecha y hora de la cita.
     * @param string $observaciones Observaciones adicionales de la cita.
     */
    public function nuevaCita($usuario, $cita, $observaciones)
    {
        try {
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
            exit();
        } catch (PDOException $e) {
            error_log("Error al insertar cita: " . $e->getMessage());
            header('Location: ../areausuarios.php?error=cita');
            exit();
        }
    }

    /**
     * * ACTUALIZAR CITA
     * Actualiza una cita en la base de datos usando la ID para localizarla.
     * @param int $id ID de la cita.
     * @param string $dia Fecha de la cita.
     * @param string $hora Hora de la cita.
     * @param string $observaciones Observaciones adicionales de la cita.
     */
    public function actualizarCita($id, $dia, $hora, $observaciones)
    {
        try {
            $cita = $dia . " " . $hora;

            $conexion = DB::conn();
            $sentencia = "UPDATE citas SET cita = :cita, observaciones = :observaciones WHERE ID = :id";

            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->bindParam(":cita", $cita);
            $consulta->bindParam(":observaciones", $observaciones);
            $consulta->execute();

            $consulta->closeCursor();
            $conexion = null;

            header('Location: ../areausuarios.php');
            exit();
        } catch (PDOException $e) {
            error_log("Error al actualizar cita: " . $e->getMessage());
            header('Location: ../areausuarios.php?error=actualizar');
            exit();
        }
    }

    /**
     * * BORRAR CITA
     * Borra una cita de la base de datos usando su ID.
     * @param int $id ID de la cita a borrar.
     */
    public function borrarCita($id)
    {
        try {
            $conexion = DB::conn();
            $sentencia = "DELETE FROM citas WHERE ID = :id";

            $consulta = $conexion->prepare($sentencia);
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->execute();

            $consulta->closeCursor();
            $conexion = null;

            header('Location: ../areausuarios.php');
            exit();
        } catch (PDOException $e) {
            error_log("Error al borrar cita: " . $e->getMessage());
            header('Location: ../areausuarios.php?error=borrar');
            exit();
        }
    }
}
