<?php
// include_once('../db/PDO.php');

$id = $_GET['id_noticia'];
$noticia = [];

$conexion = DB::conn();
$sentencia = "SELECT n.ID AS ID, 
    u.usuario AS usuario, 
    n.fecha AS fecha, 
    n.categoria AS categoria, 
    n.titular AS titular, 
    n.subtitulo AS subtitulo,
    n.noticia AS noticia  
    FROM noticias n INNER JOIN usuarios u ON n.usuario = u.id
    WHERE n.ID = :id";
$consulta = $conexion->prepare($sentencia);
$consulta->bindParam(':id', $id);
$consulta->execute();
while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
    array_push($noticia, $registro);
}
