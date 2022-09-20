<?php

    $id = $_GET['id_noticia'];

    $sql_noticias ="SELECT n.ID AS ID, 
                    u.usuario AS usuario, 
                    n.fecha AS fecha, 
                    n.categoria AS categoria, 
                    n.titular AS titular, 
                    n.subtitulo AS subtitulo,
                    n.noticia AS noticia  
                    FROM noticias n INNER JOIN usuarios u ON n.usuario = u.id 
                    WHERE n.ID = '".$id."' ORDER BY n.ID ASC;";
    $noticia=$mysqli->query($sql_noticias);
?>