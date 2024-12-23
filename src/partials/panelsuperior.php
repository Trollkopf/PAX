<?php
include_once('db/PDO.php');
include('controllers/controllerUsuario.php');

$curId= $_SESSION['ID'];
$datos = controllerUsuario::buscarUsuarioID($curId);

$curUsuario = $datos[0]->usuario;
$curNombre = $datos[0]->nombre;
$curApellido = $datos[0]->apellido;
$curRol = $datos[0]->rol; ?>

<section class='wrap wrap-content'>
    <h2>Area Administradores</h2>
    <section class='info'>
        <!--INICIO DEL BANNER-->
        <div id='banner'>
            <h2>Bienvenido a tu área personal</h2>
        </div>
    </section>
    <div class='panel'>
        <h1>Bienvenid@, <?php echo $curNombre?> <?php echo $curApellido?></h1>
        