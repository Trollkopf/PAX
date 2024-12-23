<?php
include_once('../db/PDO.php');
include_once('../models/news.php');
include_once('../helpers/curdate.php');
include_once('../helpers/currentnew.php');
?>

<!DOCTYPE html>
<html>

<head>
    <!--IDIOMA DE LOS CARACTERES-->
    <meta charset="utf-8" />
    <!--TÍTULO-->
    <title>PAX | DIGITAL MINDS</title>
    <!--ICONO-->
    <link rel="icon" type="favicon/x-icon" href="../../images/icon.png" />
    <!--LLAMADA A LAS HOJAS DE ESTILO-->
    <link rel="stylesheet" type="text/css" href="../../stylesheets/General.css" />
    <link rel="stylesheet" type="text/css" href="../../stylesheets/areausuarios.css" />
    <link rel="stylesheet" type="text/css" href="../../stylesheets/user-site.css" />

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
                <span class="displ"><img src="../../images/icon.png" alt="logo" /></span>
                <h1>PAX | DIGITAL MINDS</h1>
            </div>


            <!--MENÚ DE NAVEGACIÓN-->
            <nav id="menu">
                <ul>
                    <li><a href="../../index.html" class="btn">INICIO</a></li>
                    <li><a href="../views/galeria.php" class="btn">PORTFOLIO</a></li>
                    <li><a href="../views/presupuesto.html" class="btn">PRESUPUESTO</a></li>
                    <li><a href="../views/contacto.html" class="btn">CONTACTO</a></li>
                    <li><a href="../areausuarios.php" class="btn_in">AREA USUARIOS</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!--INICIO DE SECCION-->
    <section class="wrap wrap-content">
        <h2>EDITAR NOTICIA</h2>
        <section class="info">
            <!--INICIO DEL BANNER-->
            <div id="banner">
                <h2>EDITAR NOTICIA</h2>
            </div>

        </section>
    </section>

    <?php foreach ($noticia as $n) : ?>
        <?php $noticia = new Noticia($n['ID'], $n['usuario'], $n['fecha'], $n['categoria'], $n['titular'], $n['subtitulo'], $n['noticia']); ?>
        <!--INICIAMOS CAJA PARA VER NOTICIAS-->
        <div class='panel'>
            <h3>EDITAR NOTICIA:</h3><br />
            <form method="post" action="../router/router.php">
                <input type='text' id='curdate' name='curdate' value='<?php echo $CURDATE; ?>' hidden />
                <input type='text' id='curdate' name='id' value='<?php echo $noticia->getID(); ?>' hidden />

                <!-- INSERTAMOS DATOS DE LA NOTICIA -->

                <!--INICIAMOS LA TABLA PARA INTRODUCIR NOTICIAS-->
                <table border='1' cellpadding='4' cellspacing='2'>
                    <tr>
                        <!--TITULAR-->
                        <td>
                            <h4>TITULAR</h4>
                        </td>
                        <td align="left">
                            <input type="text" class="formText" name="titular" id="titular" value='<?php echo $noticia->getTitular(); ?>'>
                            <span id="errornew"></span>
                        </td>
                        <!--CATEGORIA-->
                        <td>
                            <h4>Categor&iacute;a</h4>
                        </td>
                        <td>
                            <select name="categoria" id="categoria">
                                <option value="<?php echo $noticia->getCategoria(); ?>" selected><?php echo $noticia->getCategoria(); ?></option>
                                <option value="Novedades">Novedades</option>
                                <option value="Tecnologia">Tecnolog&iacute;a</option>
                                <option value="Proyectos">Proyectos</option>
                            </select>
                        </td>
                        <!--BOTON-->
                        <td align="right" rowspan="3">
                            <input type="submit" name="editar_noticia" id="enviar_noticia" class="purple" value="enviar">
                        </td>
                    </tr>
                    <tr>
                        <!--SUBTITULO-->
                        <td>
                            <h4>SUBTITULO</h4>
                        </td>
                        <td align="left" colspan="3">
                            <input type="text" class="formText" name="subtitulo" id="subtitulo" value='<?php echo $noticia->getSubtitulo(); ?>'>
                        </td>
                    </tr>
                    <tr>
                        <!--NOTICIA-->
                        <td>
                            <h4>Noticia</h4>
                        </td>
                        <td colspan="3">
                            <textarea cols='90' rows='20' id='noticia' name="noticia" maxlength="65000"><?php echo $noticia->getNoticia(); ?></textarea><br />
                        </td>
                    </tr>
                </table>

                <br /><br /><a href='javascript:history.back()' class="boton_secundario" id="back_button">VOLVER ATRÁS</a>

            <?php endforeach; ?>
            </form><br />
        </div>


        <!-- INICIO FOOTER -->
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