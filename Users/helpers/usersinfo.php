<?php

$conexion = DB::conn();
$sentencia = "SELECT * FROM usuarios WHERE ID !=:id ORDER BY ID ASC;";
$listaUsuarios = $conexion->prepare($sentencia);
$listaUsuarios->bindParam(":id", $curId);
$listaUsuarios->execute();
