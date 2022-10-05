<?php
   include_once('../db/db.php');


    $sql = "SELECT  u.nombre AS nombre, 
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

    $result=$mysqli->query($sql);

    $rows['noticia'] = array();

    while($registro = $result->fetch_object()){
        array_push($rows['noticia'], $registro);
    }

    echo json_encode($rows);
?>