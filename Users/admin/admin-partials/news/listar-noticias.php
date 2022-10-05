<?php 
	include_once('helpers/newsinfo.php');
	include_once('models/news.php'); 
?>

<div class='panel'>
<h3>NOTICIAS:</h3>
	<table>
		<tr>
			<td rowspan="2"><b>Usuario</b></td>
			<td rowspan="2"><b>Fecha</b></td>
			<td rowspan="2"><b>Categoria</b></td>
			<td rowspan="2"><b>Titular</b></td>
			<td rowspan="2"><b>Subt&iacute;tulo</b></td>
			<td colspan="3"><b>Acciones</b></td>
		</tr>
		<tr>
			<td><b>Ver</b></td>
			<td><b>Editar</b></td>
			<td><b>Eliminar</b></td>
		</tr>

        <?php foreach($noticia as $n):?>
	
	<?php $noticia = new Noticia($n['ID'], $n['usuario'], $n['fecha'], $n['categoria'], $n['titular'], $n['subtitulo'], $n['noticia']);?>
	<tr>
		<td><?=$noticia->getUsuario();?></td>
		<td><?=$noticia->getFecha();?></td>
		<td><?=$noticia->getCategoria();?></td>
		<td><?=$noticia->getTitular();?></td>
		<td><?=$noticia->getSubtitulo();?></td>
        <!--LEER NOTICIA-->
        <form method='get' action='../views/leernoticia.php'>
		<td><input type='text' id='id_noticia' name='id_noticia' value='<?=$noticia->getID();?>' hidden/>		
		<button type='submit' class='edit' id='ver_noticia<?=$noticia->getID();?>' name='ver_noticia' value='' />
		<?php include ('partials/boton-ver.html');?></button></td></form>
        <!--EDITAR NOTICIA-->
        <form method='GET' action='helpers/editar-noticia.php'>
		<td><input type='text' id='id_noticia' name='id_noticia' value='<?=$noticia->getID();?>' hidden/>		
		<button type='submit' class='edit' id='editar-<?=$noticia->getID();?>' name='editar'/><?php include ('partials/boton-editar.html');?></button></td></form>
		<!--BORRAR NOTICIA-->
		<form method='post' action='controllers/borrar-noticia.php'>
		<td><input type='text' id='id_noticia' name='id_noticia' value='<?=$noticia->getID();?>' hidden/>		
		<button type='submit' class='red' id='borrar-<?=$noticia->getID();?>' name='borrar' value='' onclick="return confirm('¿Realmente desea borrar la noticia?')">
		<?php include ('partials/boton-borrar.html');?></button></td></form>
	</tr>

<?php endforeach; ?>
</table>
</div>