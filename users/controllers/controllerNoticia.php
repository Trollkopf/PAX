<?php

class controllerNoticia
{

    /**
     * * NUEVA NOTICIA
     * ? Inserta una noticia en la BD y la enlaza al usuario que la escribió
     * @param int $usuario
     * @param string $titular
     * @param string $categoria
     * @param string $noticia
     * @param string $subtitulo
     * @param string $fecha
     */
    public function nuevaNoticia($usuario, $titular, $categoria, $noticia, $subtitulo, $fecha)
    {

        $conexion = DB::conn();
        $sentencia = "INSERT INTO noticias (usuario, titular, categoria, noticia, subtitulo, fecha) 
        VALUES (:usuario, :titular, :categoria, :noticia, :subtitulo, :fecha);";

        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":usuario", $usuario);
        $consulta->bindParam(":titular", $titular);
        $consulta->bindParam(":categoria", $categoria);
        $consulta->bindParam(":noticia", $noticia);
        $consulta->bindParam(":subtitulo", $subtitulo);
        $consulta->bindParam(":fecha", $fecha);

        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        header('Location: ../areausuarios.php');
    }

    /**
     * * EDITAR NOTICIA
     * ? cambia los datos de una noticia en la BD
     * @param int $id
     * @param string $titular
     * @param string $categoria
     * @param string $noticia
     * @param string $subtitulo
     * @param string $fecha
     */
    public function editarNoticia($id, $titular, $categoria, $noticia, $subtitulo, $fecha)
    {

        $conexion = DB::conn();
        $sentencia = "UPDATE noticias SET noticia = :noticia, categoria = :categoria, fecha = :fecha, titular= :titular, subtitulo = :subtitulo WHERE ID = :id";

        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->bindParam(":titular", $titular);
        $consulta->bindParam(":categoria", $categoria);
        $consulta->bindParam(":noticia", $noticia);
        $consulta->bindParam(":subtitulo", $subtitulo);
        $consulta->bindParam(":fecha", $fecha);

        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
        header('Location: ../areausuarios.php');
    }

    /**
     * * BORRAR NOTICIA
     * ? Elimina los datos de una noticia de la BD
     * @param int $id
     */
    public static function borrarNoticia($id)
    {
        $conexion = DB::conn();
        $sentencia = "DELETE FROM noticias WHERE ID= :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;

        header('Location:../areausuarios.php');
    }
}
