<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
	include_once(DB_PATH.'db.php');

	$id = $_POST['id_noticia'];
	
	$drop = "DELETE FROM noticias WHERE ID=".$id;

    $mysqli->query($drop);
    header('Location: ../areausuarios.php');			
?>