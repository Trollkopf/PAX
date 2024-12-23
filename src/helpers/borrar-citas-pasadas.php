<?php
// * BORRAMOS CITAS PASADAS

$conexion = DB::conn();
$sentencia = "DELETE FROM citas WHERE cita < (SELECT NOW());";
$consulta = $conexion->prepare($sentencia);
$consulta->execute();
$consulta->closeCursor();
$conexion = null;
