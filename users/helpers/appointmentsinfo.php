<?php

$conexion = DB::conn();

if ($curRol != 'ADMIN') {
    $sentencia = "SELECT ci.ID as 'ID', 
                  us.nombre as 'nombre', 
                  ci.cita as 'fecha', 
                  us.apellido as 'apellido', 
                  DATE_FORMAT(ci.cita, '%d') AS 'dia', 
                  DATE_FORMAT(ci.cita, '%M') AS 'mes', 
                  DATE_FORMAT(ci.cita, '%Y') AS 'año', 
                  DATE_FORMAT(ci.cita, '%T') AS 'hora', 
                  ci.observaciones AS observaciones 
                  FROM citas ci 
                  INNER JOIN usuarios us  ON ci.usuario = us.ID 
                  WHERE us.id = :id
                  ORDER BY ci.cita ASC;";
    $appointment = $conexion->prepare($sentencia);
    $appointment->bindParam(":id", $curId);
} else {
    $sentencia = " SELECT ci.ID as 'ID', 
        us.nombre as 'nombre', 
        ci.cita as 'fecha', 
        us.apellido as 'apellido', 
        DATE_FORMAT(ci.cita, '%d') AS 'dia', 
        DATE_FORMAT(ci.cita, '%M') AS 'mes', 
        DATE_FORMAT(ci.cita, '%Y') AS 'año', 
        DATE_FORMAT(ci.cita, '%T') AS 'hora', 
        ci.observaciones AS observaciones 
        FROM citas ci 
        INNER JOIN usuarios us  ON ci.usuario = us.ID 
        ORDER BY ci.cita ASC;";
    $appointment = $conexion->prepare($sentencia);
}

$appointment->execute();
