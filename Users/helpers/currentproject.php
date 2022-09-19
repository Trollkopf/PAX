<?php
    $id_proyecto = $_POST['id_proyecto']; 

    $sql_proyecto ="SELECT ID_proyecto, nombre_proyecto, datos, tecnologia_empleada, tiempo_consecucion, imagen FROM proyectos WHERE ID_proyecto = ".$id_proyecto;
    $proyecto=$mysqli->query($sql_proyecto);
    
?>
