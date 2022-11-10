<?php
// include_once('../db/PDO.php');
$conexion = DB::conn();
$sentencia = "SELECT n.ID AS ID, 
                  u.usuario AS usuario, 
                  n.fecha AS fecha, 
                  n.categoria AS categoria, 
                  n.titular AS titular, 
                  n.subtitulo AS subtitulo,
                  n.noticia AS noticia  
                  FROM noticias n INNER JOIN usuarios u ON n.usuario = u.id 
                  ORDER BY n.ID ASC;";
$noticia = $conexion->prepare($sentencia);
$noticia->execute();

