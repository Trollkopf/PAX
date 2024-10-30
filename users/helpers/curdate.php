<?php
// * OBTENEMOS LA FECHA ACTUAL

    $conexion = DB::conn();
    $sentencia = "SELECT CURDATE();";
    $consulta = $conexion->prepare($sentencia);
    $consulta->execute();
    while( $fila = $consulta->fetch(PDO::FETCH_ASSOC)){
        $CURDATE = $fila['CURDATE()'];
    }
    $consulta->closeCursor();
    $conexion = null;