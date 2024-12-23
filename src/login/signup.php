<!DOCTYPE html>
<html lang="es">
<?php
$basePath= '../';
include "{$basePath}/partials/head.php";
?>

<body class="flex flex-col min-h-screen bg-gray-100">
    <?php include "{$basePath}/partials/header.php"; ?>

    <!-- SECCIÓN DE REGISTRO -->
    <main class="container mx-auto px-4 py-10 flex-grow">
        <section class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Nuevo Usuario</h2>

            <!-- FORMULARIO -->
            <form id="signup" action="../router/router.php" method="post" class="space-y-4">
                <!-- Usuario -->
                <div>
                    <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Inserte su nombre de usuario"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                </div>
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Inserte su nombre"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                </div>
                <!-- Apellido -->
                <div>
                    <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Inserte su apellido"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                </div>
                <!-- Contraseña -->
                <div>
                    <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Inserte su contraseña"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="Inserte su E-mail"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                </div>
                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Inserte su teléfono"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                </div>

                <input type="hidden" name="action" value="signup">

                <!-- Botones -->
                <div class="flex justify-between items-center">
                    <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                        Vaciar
                    </button>
                    <button type="submit" name="signup" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">
                        Enviar
                    </button>
                </div>

                <!-- Enlace Volver Atrás -->
                <div class="text-center mt-4">
                    <a href="../areausuarios.php" class="text-teal-600 hover:underline">Volver Atrás</a>
                </div>

                <!-- Mensaje de Error -->
                <?php
                $registro = null;
                $advertencia = null;
                if (isset($_GET['registro'])) {
                    $registro = $_GET['registro'];
                    $advertencia = match ($registro) {
                        "usuario" => "Usuario ya registrado",
                        "email" => "Email ya registrado",
                        "telefono" => "Teléfono ya registrado",
                    };
                }
                ?>
                <span id="error" class="text-red-600 text-sm font-semibold">
                    <?php echo $advertencia ?>
                </span>
            </form>
        </section>
    </main>

    <!-- PIE DE PÁGINA -->
    <footer class="bg-teal-600 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; PAX | DIGITAL MINDS 2022</p>
            <p>Avenida de Palmela 19 - 03730 Jávea (Alicante)</p>
            <p>
                <a href="#" class="hover:underline">Política de cookies</a> | 
                <a href="#" class="hover:underline">Política de privacidad</a> | 
                <a href="../../views/avisolegal.html" class="hover:underline">Aviso Legal</a>
            </p>
        </div>
    </footer>

    <script>
        $("form").submit(function (event) {
            let campos = ['#usuario', '#nombre', '#apellido', '#contrasena', '#email', '#telefono'];
            let error = null;

            campos.forEach(function (campo) {
                if ($(campo).val().length <= 0) {
                    error = `Debe rellenar el campo <b>${$(campo).attr('name').toUpperCase()}</b>`;
                }
            });

            if (error) {
                $('#error').html(error);
                event.preventDefault();
            } else {
                $('#error').html('');
            }
        });
    </script>
</body>

</html>
