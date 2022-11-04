<?php

include_once('db/db.php');
include_once('models/news.php');

class controllerNoticia{


    public static function crearNoticia($usuario, $titular, $categoria, $noticia, $subtitulo, $fecha){

        $conexion = DB::conn();

        $noticia = new Noticia("","","","","","","");

        $noticia->setID(null);
        $noticia->setUsuario($_POST['user']);
        $noticia->setFecha($_POST['curdate']);
        $noticia->setCategoria($_POST['categoria']);
        $noticia->setTitular($_POST['titular']);
        $noticia->setSubtitulo($_POST['subtitulo']);
        $noticia->setNoticia($_POST['noticia']);
    }

}