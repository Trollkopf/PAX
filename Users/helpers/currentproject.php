<?php
    $id= $_POST['id_proyecto'];
    $proyecto = [];
    
    $conexion = DB::conn();
    $sentencia = "SELECT ID_proyecto, nombre_proyecto, datos, tecnologia_empleada, tiempo_consecucion, imagen FROM proyectos WHERE ID_proyecto = :id;";
    $consulta = $conexion->prepare($sentencia);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
        array_push($proyecto, $fila);
    }
