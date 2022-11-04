<?php
include_once('helpers/usersinfo.php');
include_once('models/user.php');
?>
<section>
	<h3>USUARIOS:</h3>
	<table border='0' cellpadding='4' cellspacing='2'>
		<tr>
			<td rowspan="2"><b>Usuario</b></td>
			<td rowspan="2"><b>Nombre</b></td>
			<td rowspan="2"><b>Apellido</b></td>
			<td rowspan="2"><b>email</b></td>
			<td rowspan="2"><b>Teléfono</b></td>
			<td rowspan="2"><b>ROL</b></td>
			<td colspan="3"><b>ACCIONES</b></td>
		</tr>
		<tr>
			<td><b>Cambiar Rol</b></td>
			<td><b>Editar</b></td>
			<td><b>Eliminar</b></td>
		</tr>

		<?php foreach ($userinfo as $u) : ?>
			<?php $usuario = new User($u['ID'], $u['usuario'], $u['nombre'], $u['apellido'], $u['email'], $u['telefono'], $u['rol']); ?>
			<tr>
				<td><b><?= $usuario->getUsuario(); ?></b></td>
				<td><b><?= $usuario->getNombre(); ?></b></td>
				<td><b><?= $usuario->getApellido(); ?></b></td>
				<td><b><?= $usuario->getEmail(); ?></b></td>
				<td><b><?= $usuario->getTelefono(); ?></b></td>
				<td><b><?= $usuario->getRol(); ?></b></td>

				<!-- INSERTAMOS LOS BOTONES -->
				<?php include('admin/admin-partials/users/botones-usuario.php'); ?>
			</tr>
			<!--INSERTAMOS EL FORMULARIO PARA CAMBIAR USUARIO-->
			<?php include('admin/admin-partials/users/editar-usuario.php'); ?>
		<?php endforeach; ?>

	</table>
</section>