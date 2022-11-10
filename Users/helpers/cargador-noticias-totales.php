<?php
include_once('../db/PDO.php');

$rows['noticia'] = array();

$conexion = DB::conn();
$sentencia =  "SELECT  u.nombre AS nombre, 
               u.apellido AS apellido, 
               n.id AS id, 
               n.fecha AS fecha, 
               n.categoria AS categoria, 
               n.titular AS titular, 
               n.noticia AS noticia, 
               n.subtitulo AS subtitulo 
               FROM noticias n 
               INNER JOIN usuarios u ON n.usuario = u.id 
               ORDER BY n.id DESC";

$consulta = $conexion->prepare($sentencia);
$consulta->execute();
while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
    array_push($rows['noticia'], $registro);
}

$consulta->closeCursor();
$conexion = null;

echo json_encode($rows);
