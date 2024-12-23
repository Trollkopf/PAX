<div class="flex justify-center space-x-4 my-4">
    <!-- Botones -->
    <button type="button" id="toggleAppointments" class="bg-teal-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
        MIS CITAS
    </button>
    <button type="button" id="toggleUser" class="bg-teal-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
        MI CUENTA
    </button>
    <a href="cerrarSesion.php" class="bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
        CERRAR SESIÓN
    </a>
</div>

<!-- Sección Administrar Citas -->
<div id="infoappointments" class="info_box bg-gray-100 p-6 rounded-lg shadow-md hidden">
    <?php include("client/appointments.php"); ?>
</div>

<!-- Sección Administrar Cuenta -->
<div id="infoaccount" class="info_box bg-gray-100 p-6 rounded-lg shadow-md hidden">
    <?php include("partials/account.php"); ?>
</div>

<script>
    $(document).ready(function() {
        // Mostrar la sección de citas al cargar la página
        $('#infoappointments').show();

        // Alternar entre las ventanas
        $('#toggleAppointments').click(function() {
            $('#infoappointments').toggle(); // Alternar visibilidad
            $('#infoaccount').hide(); // Ocultar cuenta
        });

        $('#toggleUser').click(function() {
            $('#infoaccount').toggle(); // Alternar visibilidad
            $('#infoappointments').hide(); // Ocultar citas
        });
    });
</script>
