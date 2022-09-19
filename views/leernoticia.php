<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(DB_PATH.'db.php');
    include_once(HELPERS_PATH.'currentnew.php');
    include_once(MODELS_PATH.'news.php')
?>

<!DOCTYPE html>
<html>
    <head>
    	<!--IDIOMA DE LOS CARACTERES-->
        <meta charset="utf-8" />
        <!--TÍTULO-->
        <title>PAX | DIGITAL MINDS</title>
        <!--ICONO-->
        <link rel="icon" type="favicon/x-icon" href="../images/icon.png" />
        <!--LLAMADA A LAS HOJAS DE ESTILO-->
        <link rel="stylesheet" type="text/css" href="../stylesheets/General.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheets/areausuarios.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheets/user-site.css" />

        <!--LLAMADA A LOS SCRIPTS-->
        <script src="../scripts/RRSS.js"></script>


        <!--METADATOS-->
        <meta name="author" content="Maximiliano Serratosa" />
        <meta name="robots" content="follow" />
        <meta name="description" content="PAX | DIGITAL MINDS es tu solucion para tu aplicacion web" />
        <meta name="keywords" content="html, css, javascript, php, diseño web, ajax, mysql" />
        <meta name="revisit-after" content="7 days" />
        <meta name="category" content="Web app" />
    	<title>LECTURA DE NOTICIAS</title>
    </head>
    <body>

    	<!--INICIO DE LA CABECERA-->
        <header id="header">
            <div class="wrap">
                <div id="logo">
                    <span class="displ"><img src="../images/icon.png" alt="logo" /></span>
                    <h1>PAX | DIGITAL MINDS</h1>
                </div>


                <!--MENÚ DE NAVEGACIÓN-->
                <nav id="menu">
                    <ul>
                        <li><a href="../index.html" class="btn">INICIO</a></li>
                        <li><a href="galeria.php" class="btn">PORTFOLIO</a></li>
                        <li><a href="presupuesto.html" class="btn">PRESUPUESTO</a></li>
                        <li><a href="contacto.html" class="btn">CONTACTO</a></li>
                        <li><a href="../users/areausuarios.php" class="btn_in">AREA USUARIOS</a></li>
                    </ul>
                </nav>
            </div>
        </header>

    <!--INICIO DE SECCION-->
        <section class="wrap wrap-content"><h2>LECTURA DE NOTICIAS</h2>
            <section class="info">
                <!--INICIO DEL BANNER-->
                <div id="banner"><h2>LECTURA DE NOTICIAS</h2></div>

            </section>
        </section>

        <?php foreach($noticia as $n):?>
	
	    <?php $noticia = new Noticia($n['ID'], $n['usuario'], $n['fecha'], $n['categoria'], $n['titular'], $n['subtitulo'], $n['noticia']);?>

        <!--INICIAMOS CAJA PARA VER NOTICIAS-->
        <section class="wrap wrap-content">
            <section id="articles">
    			<article>
                    <div class="data">
                        <span>Fecha: <?php echo $noticia->getFecha();?></span>
                        <span>Categor&iacute;a: <?php echo $noticia->getCategoria();?></span>
                    </div>
                    <h4><a href="#"><?php echo $noticia->getTitular();?></a></h4>
                    <h5>&nbsp;Por:  <?php echo $noticia->getUsuario();?></h5>
                    <p>
                    	<?php echo $noticia->getNoticia();?>                  
                    </p>


                    
                    <br/><br/><a href='javascript:history.back()' class="boton_secundario" id="back_button">VOLVER ATRÁS</a>
                </article>
            </section>
        </section>

        <?php endforeach;?>

        <section>
    </section>
        

            <div class="clearfix"></div>
        <footer id="footer">

            <div class="wrap">

                
                <div>
                    <h5>PAX | DIGITAL MINDS</h5>
                    <!--DIRECCION-->
                    Avenida de Palmela 19 - 03730 J&aacute;vea (Alicante)<br />
                    <!--AVISO LEGAL-->
                    <p><a href="#" class="advice">Política de cookies</a>&nbsp; | &nbsp;
                    <a href="#" class="advice">Política de privacidad</a>&nbsp; | &nbsp;
                    <a href="views/avisolegal.html" class="advice">Aviso Legal</a></p>
                    
                    </p>&copy; PAX | DIGITAL MINDS 2022
                </div>

            </div>
        </footer>
</html>