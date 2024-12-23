<?php
include_once('models/appointment.php');
include_once('helpers/now.php');
include_once('helpers/appointmentsinfo.php');
?>

<div class="bg-white p-6 rounded-lg shadow-lg">
    <h3 class="text-2xl font-bold text-teal-700 mb-4">MIS CITAS</h3>
    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-teal-600 text-white">
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Apellido</th>
                <th class="border border-gray-300 px-4 py-2">Día</th>
                <th class="border border-gray-300 px-4 py-2">Mes</th>
                <th class="border border-gray-300 px-4 py-2">Año</th>
                <th class="border border-gray-300 px-4 py-2">Hora</th>
                <th class="border border-gray-300 px-4 py-2">Observaciones</th>
                <th class="border border-gray-300 px-4 py-2">Editar</th>
                <th class="border border-gray-300 px-4 py-2">Borrar</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php foreach ($appointment as $a) : ?>
                <?php $cita = new Appointment($a['ID'], $a['nombre'], $a['apellido'], $a['dia'], $a['mes'], $a['año'], $a['hora'], $a['observaciones']); ?>
                <tr class="text-center border-b border-gray-200">
                    <td class="px-4 py-2"><?= htmlspecialchars($cita->getNombre()); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($cita->getApellido()); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($cita->getDia()); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars(cambiaM_a_espanol($cita->getMes())); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($cita->getAño()); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($cita->getHora()); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($cita->getObs()); ?></td>

                    <!-- Control de edición según horas restantes -->
                    <?php
                    $FECHA = $a['fecha'];
                    include('helpers/horasrestantes.php');

                    if ($horasrestantes >= 72) :
                    ?>
                        <!-- Botones de Editar y Borrar -->
                        <td class="px-4 py-2">
                            <?php include('client/client-partials/appointments/botonesCita.php'); ?>
                        </td>
                        <td class="px-4 py-2">
                            <?php include('client/client-partials/appointments/editar-cita.php'); ?>
                        </td>
                    <?php else : ?>
                        <td colspan="2" class="text-red-500 font-semibold px-4 py-2">Fuera de plazo de modificación</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
