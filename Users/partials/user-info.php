<?php
include_once('helpers/currentuser.php');
include_once('models/user.php');
?>
<h3>MI CUENTA:</h3>

<table border='0' cellpadding='4' cellspacing='2'>
	<tr>
		<td><b>Usuario</b></td>
		<td><b>Nombre</b></td>
		<td><b>Apellido</b></td>
		<td><b>E-mail</b></td>
		<td><b>Teléfono</b></td>
	</tr>

	<?php foreach ($usuario as $u) : ?>
		<?php $user = new User($u['ID'], $u['usuario'], $u['nombre'], $u['apellido'], $u['email'], $u['telefono'], $u['rol']); ?>
		<tr>
			<td><b><?= $user->getUsuario(); ?></b></td>
			<td><b><?= $user->getNombre(); ?></b></td>
			<td><b><?= $user->getApellido(); ?></b></td>
			<td><b><?= $user->getEmail(); ?></b></td>
			<td><b><?= $user->getTelefono(); ?></b></td>
		</tr>
	<?php endforeach; ?>
</table>