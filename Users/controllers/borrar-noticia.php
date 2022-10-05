<?php 
    include_once('../db/db.php');

	$id = $_POST['id_noticia'];
	
	$drop = "DELETE FROM noticias WHERE ID=".$id;

    $mysqli->query($drop);
    header('Location: ../areausuarios.php');			
?>