<?php 
// include_once('../db/PDO.php');

    $conexion = DB::conn();
    $sentencia = "SELECT TIMESTAMPDIFF(HOUR, :ahora, :fecha) AS horas;";
    $consulta = $conexion->prepare($sentencia);
    $consulta->bindParam(':ahora', $NOW);
    $consulta->bindParam(':fecha', $FECHA);
    $consulta->execute();
    while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
        $horasrestantes = $registro['horas'];
    }

