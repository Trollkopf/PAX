<?php
include_once('db/PDO.php');
include('controllers/controllerUsuario.php');

// Obtener los datos del usuario actual
$curId = $_SESSION['ID'];
$datos = controllerUsuario::buscarUsuarioID($curId);

if (!$datos || count($datos) == 0) {
    echo "<p class='text-red-500 font-bold'>Error: Usuario no encontrado.</p>";
    exit();
}

$curUsuario = $datos[0]->usuario;
$curNombre = htmlspecialchars($datos[0]->nombre);
$curApellido = htmlspecialchars($datos[0]->apellido);
$curRol = htmlspecialchars($datos[0]->rol);
?>

<section class="bg-gray-100 py-10">
    <div class="container mx-auto px-4">
        <!-- Banner -->
        <section class="bg-teal-600 text-white rounded-lg shadow-lg p-6 mb-10 text-center">
            <h2 class="text-xl font-semibold">Bienvenido a tu área personal</h2>
        </section>

        <!-- Panel de Usuario -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-gray-700 mb-4">Bienvenid@, <?php echo $curNombre; ?> <?php echo $curApellido; ?></h1>
        </div>
    </div>
</section>
