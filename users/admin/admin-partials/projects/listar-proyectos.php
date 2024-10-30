<?php
include_once('helpers/projectsinfo.php');
include_once('models/project.php'); ?>

<div class='panel'>
	<h3>PROYECTOS:</h3>
	<table>
		<tr>
			<td rowspan="2"><b>Nombre</b></td>
			<td rowspan="2"><b>Datos</b></td>
			<td rowspan="2"><b>Tecnología Empleada</b></td>
			<td rowspan="2"><b>Tiempo de consecución</b></td>
			<td rowspan="2"><b>Ruta Imagen</b></td>
			<td colspan="3"><b>Acciones</b></td>
		</tr>
		<tr>
			<td><b>Ver</b></td>
			<td><b>Editar</b></td>
			<td><b>Eliminar</b></td>
		</tr>

		<?php foreach ($proyecto as $p) : ?>

			<?php $proyecto = new Proyecto($p['ID'], $p['nombre'], $p['datos'], $p['tecnologia'], $p['tiempo'], $p['imagen']); ?>
			<tr>
				<td><?= $proyecto->getNombre_proyecto(); ?></td>
				<td><?= $proyecto->getDatos(); ?></td>
				<td><?= $proyecto->getTecnologia(); ?></td>
				<td><?= $proyecto->getTiempo(); ?></td>
				<td><?= $proyecto->getImagen(); ?></td>
				<!--LEER PROYECTO-->
				<form method='post' action='../views/verproyecto.php'>
					<td><input type='text' id='id_proyecto' name='id_proyecto' value='<?= $proyecto->getID(); ?>' hidden />
						<button type='submit' class='edit' id='ver_proyecto<?= $proyecto->getID(); ?>' name='ver_proyecto' value='' />
						<?php include('partials/boton-ver.html'); ?></button>
					</td>
				</form>
				<!--EDITAR PROYECTO-->
				<form method='post' action='helpers/editar-proyecto.php'>
					<td><input type='text' id='id_proyecto' name='id_proyecto' value='<?= $proyecto->getID(); ?>' hidden />
						<button type='submit' class='edit' id='editar-<?= $proyecto->getID(); ?>' name='editar' /><?php include('partials/boton-editar.html'); ?></button>
					</td>
				</form>
				<!--BORRAR PROYECTO-->
				<form method='post' action='router/router.php'>
					<td><input type='text' id='id_proyecto' name='id_proyecto' value='<?= $proyecto->getID(); ?>' hidden />
						<button type='submit' class='red' id='borrar-<?= $proyecto->getID(); ?>' name='borrar_proyecto' value='borrar' onclick="return confirm('¿Realmente desea borrar el proyecto?')">
							<?php include('partials/boton-borrar.html'); ?></button>
					</td>
				</form>
			</tr>

		<?php endforeach; ?>
	</table>
</div>

</section>