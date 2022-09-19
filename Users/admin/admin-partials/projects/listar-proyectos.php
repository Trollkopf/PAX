<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(HELPERS_PATH.'projectsinfo.php');
	include_once(MODELS_PATH.'project.php'); ?>

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

		<?php foreach($proyecto as $p):?>
	
	<?php $proyecto = new Proyecto($p['ID'], $p['nombre'], $p['datos'], $p['tecnologia'], $p['tiempo'], $p['imagen']);?>
	<tr>
		<td><?=$proyecto->getNombre_proyecto();?></td>
		<td><?=$proyecto->getDatos();?></td>
		<td><?=$proyecto->getTecnologia();?></td>
		<td><?=$proyecto->getTiempo();?></td>
		<td><?=$proyecto->getImagen();?></td>
        <!--LEER PROYECTO-->
        <form method='post' action=TODO:'../views/leerproyecto.php'>
		<td><input type='text' id='id_proyecto' name='id_proyecto' value='<?=$proyecto->getID();?>' hidden/>		
		<button type='submit' class='edit' id='ver_proyecto<?=$proyecto->getID();?>' name='ver_proyecto' value='' />
		<?php include (PARTIALS_PATH.'boton-ver.html');?></button></td></form>
        <!--EDITAR PROYECTO-->
        <form method='post' action='helpers/editar-proyecto.php'>
		<td><input type='text' id='id_proyecto' name='id_proyecto' value='<?=$proyecto->getID();?>' hidden/>		
		<button type='submit' class='edit' id='editar-<?=$proyecto->getID();?>' name='editar'/><?php include (PARTIALS_PATH.'boton-editar.html');?></button></td></form>
		<!--BORRAR PROYECTO-->
		<form method='post' action='controllers/borrar-proyecto.php'>
		<td><input type='text' id='id_proyecto' name='id_proyecto' value='<?=$proyecto->getID();?>' hidden/>		
		<button type='submit' class='red' id='borrar-<?=$proyecto->getID();?>' name='borrar' value='' onclick="return confirm('¿Realmente desea borrar el proyecto?')">
		<?php include (PARTIALS_PATH.'boton-borrar.html');?></button></td></form>
	</tr>

<?php endforeach; ?>
</table>
</div>    
        
</section>