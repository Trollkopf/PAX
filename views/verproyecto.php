<?php
include_once('../users/db/PDO.php');
include_once('../users/helpers/currentproject.php');
include_once('../users/models/project.php')
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
    <script src="../scripts/rrss.js"></script>


    <!--METADATOS-->
    <meta name="author" content="Maximiliano Serratosa" />
    <meta name="robots" content="follow" />
    <meta name="description" content="PAX | DIGITAL MINDS es tu solucion para tu aplicacion web" />
    <meta name="keywords" content="html, css, javascript, php, diseño web, ajax, mysql" />
    <meta name="revisit-after" content="7 days" />
    <meta name="category" content="Web app" />
    <title>VER PROYECTO</title>
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
                    <li><a href="portfolio.php" class="btn">PORTFOLIO</a></li>
                    <li><a href="presupuesto.html" class="btn">PRESUPUESTO</a></li>
                    <li><a href="contacto.html" class="btn">CONTACTO</a></li>
                    <li><a href="../users/areausuarios.php" class="btn_in">AREA USUARIOS</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!--INICIO DE SECCION-->
    <section class="wrap wrap-content">
        <h2>VER PROYECTO</h2>
        <section class="info">

            <?php foreach ($proyecto as $p) : ?>
                <?php $proyecto = new Proyecto($p['ID_proyecto'], $p['nombre_proyecto'], $p['datos'], $p['tecnologia_empleada'], $p['tiempo_consecucion'], $p['imagen']); ?>
                <!--INICIO DEL BANNER-->
                <div id="banner">
                    <h2><?php echo $proyecto->getNombre_proyecto(); ?></h2>
                </div>

        </section>
    </section>


    <!--INICIAMOS CAJA PARA VER NOTICIAS-->
    <section class="wrap wrap-content">
        <section id="articles">
            <article>
                <div class="data">
                    <span>Tecnología empleada: <?php echo $proyecto->getTecnologia(); ?></span>
                    <span>Tiempo de consecuci&oacute;n: <?php echo $proyecto->getTiempo(); ?></span>
                </div>
                <h4><?php echo $proyecto->getNombre_proyecto(); ?></h4>
                <h5><?php echo $proyecto->getDatos(); ?></h5>
                <p>
                    <img src='../<?= $proyecto->getImagen(); ?>' /><br /><br /><br />
                </p>



                <br /><br /><a href='javascript:history.back()' class="boton_secundario" id="back_button">VOLVER ATRÁS</a>
            </article>
        </section>
    </section>

<?php endforeach; ?>

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
                <a href="views/avisolegal.html" class="advice">Aviso Legal</a>
            </p>

            </p>&copy; PAX | DIGITAL MINDS 2022
        </div>

    </div>
</footer>

</html>