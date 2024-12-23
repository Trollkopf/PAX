<?php

$conexion = DB::conn();
$sentencia = "SELECT NOW() AS NOW;";
$consulta = $conexion->prepare($sentencia);
$consulta->execute();
while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
	$NOW = $registro['NOW'];
}
