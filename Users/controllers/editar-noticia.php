<?php 
include_once('../db/db.php');

$ID = $_POST['id'];
$fecha = $_POST['curdate'];
$categoria = $_POST['categoria'];
$titular = $_POST['titular'];
$subtitulo = $_POST['subtitulo'];
$noticia = $_POST['noticia'];

$update = "UPDATE noticias SET noticia = '".$noticia."', categoria ='".$categoria."', fecha = '".$fecha."', titular= '".$titular."', subtitulo = '".$subtitulo."' WHERE ID = '".$ID."'";

$mysqli->query($update);

header("Location: ../areausuarios.php");
?>