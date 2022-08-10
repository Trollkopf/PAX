<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(HELPERS_PATH.'selectcurrentuserinfo.php');
	include_once(MODELS_PATH.'user.php');
?>
<h3>MI CUENTA:</h3>
      
	<table border='0' cellpadding='4' cellspacing='2'>
		<tr><td><b>Usuario</b></td>
			<td><b>Nombre</b></td>
			<td><b>Apellido</b></td>
			<td><b>E-mail</b></td>
			<td><b>Teléfono</b></td>
		</tr>
		
		<?php foreach($result as $r):?>
	<?php $usuario = new User($r['ID'], $r['usuario'], $r['nombre'], $r['apellido'], $r['email'], $r['telefono'], $r['rol']);?>
		<tr>
			<td><b><?=$usuario->getUsuario();?></b></td>
			<td><b><?=$usuario->getNombre();?></b></td>
			<td><b><?=$usuario->getApellido();?></b></td>
			<td><b><?=$usuario->getEmail();?></b></td>
			<td><b><?=$usuario->getTelefono();?></b></td>
		</tr>
	<?php endforeach;?>
	</table>

	