<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(DB_PATH.'db.php');
    include_once(MODELS_PATH.'news.php');

    $noticia = new Noticia("","","","","","","");

    $noticia->setID(null);
    $noticia->setUsuario($_POST['user']);
    $noticia->setFecha($_POST['curdate']);
    $noticia->setCategoria($_POST['categoria']);
    $noticia->setTitular($_POST['titular']);
    $noticia->setSubtitulo($_POST['subtitulo']);
    $noticia->setNoticia($_POST['noticia']);
    

	$sql = "INSERT INTO noticias (usuario, titular, categoria, noticia, subtitulo, fecha) 
    VALUES ('".$noticia->getUsuario()."',
            '".$noticia->getTitular()."', 
            '".$noticia->getCategoria()."', 
            '".$noticia->getNoticia()."', 
            '".$noticia->getSubtitulo()."',
            '".$noticia->getFecha()."' );";

    $results = $mysqli->query($sql);

    if($results){
        header("Location: ../../areausuarios.php");
    }else{
        echo "###ERROR###";
    }

 ?>