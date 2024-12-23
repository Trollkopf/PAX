<?php

class controllerProyecto
{

    public function crearProyecto($nombre, $datos, $tecnologia, $consecucion, $imagen)
    {

        $conexion = DB::conn();
        $sentencia = "INSERT INTO proyectos (nombre_proyecto, datos, tecnologia_empleada, tiempo_consecucion, imagen) VALUES (:nombre, :datos, :tecnologia, :consecucion, :imagen );";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':datos', $datos);
        $consulta->bindParam(':tecnologia', $tecnologia);
        $consulta->bindParam(':consecucion', $consecucion);
        $consulta->bindParam(':imagen', $imagen);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;

        header('Location: ../areausuarios.php');
    }

    public function editarProyecto($id, $nombre, $datos, $tecnologia, $consecucion, $imagen)
    {

        $conexion = DB::conn();
        $sentencia = "UPDATE proyectos SET nombre_proyecto = :nombre, datos = :datos, tecnologia_empleada = :tecnologia, tiempo_consecucion= :consecucion, imagen = :imagen WHERE (ID_proyecto = :id)";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':datos', $datos);
        $consulta->bindParam(':tecnologia', $tecnologia);
        $consulta->bindParam(':consecucion', $consecucion);
        $consulta->bindParam(':imagen', $imagen);

        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;

        header('Location: ../areausuarios.php');
    }



    public function borrarProyecto($id)
    {

        $conexion = DB::conn();
        $sentencia = "DELETE FROM proyectos WHERE ID_proyecto= :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;

        header('Location: ../areausuarios.php');
    }
}
