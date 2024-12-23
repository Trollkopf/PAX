<?php
include_once('../db/PDO.php');
include_once('../models/project.php');
include_once('../helpers/curdate.php');
?>

<!DOCTYPE html>
<html>

<head>
    <!--IDIOMA DE LOS CARACTERES-->
    <meta charset="utf-8" />
    <!--TÍTULO-->
    <title>PAX | DIGITAL MINDS</title>
    <!--ICONO-->
    <link rel="icon" type="favicon/x-icon" href="../../../images/icon.png" />
    <!--LLAMADA A LAS HOJAS DE ESTILO-->
    <link rel="stylesheet" type="text/css" href="../../stylesheets/General.css" />
    <link rel="stylesheet" type="text/css" href="../../stylesheets/areausuarios.css" />

    <!--LLAMADA A LOS SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <!--METADATOS-->
    <meta name="author" content="Maximiliano Serratosa" />
    <meta name="robots" content="follow" />
    <meta name="description" content="PAX | DIGITAL MINDS es tu solucion para tu aplicacion web" />
    <meta name="keywords" content="html, css, javascript, php, diseño web, ajax, mysql" />
    <meta name="revisit-after" content="7 days" />
    <meta name="category" content="Web app" />
    <title>EDITAR PROYECTO</title>
</head>

<body onload="categorias()">

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
                    <li><a href="../galeria.html" class="btn">GALER&Iacute;A</a></li>
                    <li><a href="../presupuesto.html" class="btn">PRESUPUESTO</a></li>
                    <li><a href="../contacto.html" class="btn">CONTACTO</a></li>
                    <li><a href="../areausuarios.php" class="btn_in">AREA USUARIOS</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!--INICIO DE SECCION-->
    <section class="wrap wrap-content">
        <h2>EDITAR PROYECTO</h2>
        <section class="info">
            <!--INICIO DEL BANNER-->
            <div id="banner">
                <h2>EDITAR PROYECTO</h2>
            </div>

        </section>
    </section>


    <div class='panel'>
        <h3> CREAR PROYECTO: INFORMACI&Oacute;n</h3><br />
        <?php include('../helpers/tratamiento-imagenes.php'); ?>

        <div class="caja_centrada">
            <form method="post" action="../router/router.php">

                <h4>Imagen del proyecto:</h4><br />
                <img src='../../<?php echo $ruta_imagen; ?>' /><br /><br /><br />
                <table>
                    <tr>
                        <td>Nombre del Proyecto:</td>
                        <td colspan="2"><input type="Text" class="formText" name="nombre_proyecto" id="nombre_proyecto"></td>
                    </tr>
                    <tr>
                        <td>Datos:</td>
                        <td colspan="2"><input type="Text" class="formText" name="datos_proyecto" id="datos_proyecto"></td>
                    </tr>
                    <tr>
                        <td>Tecnolog&iacute;a:</td>
                        <td colspan="2">
                            <input type="checkbox" id="Html" name="Html" value="Html"> Html
                            <input type="checkbox" id="Css" name="Css" value="Css"> Css
                            <input type="checkbox" id="JS" name="JavaScript" value="JavaScript"> JavaScript
                            <input type="checkbox" id="MySQL" name="MySQL" value="MySQL"> MySQL
                            <input type="checkbox" id="PHP" name="PHP" value="PHP"> PHP
                            <input type="checkbox" id="Csharp" name="C#" value="C#"> C#
                        </td>
                    </tr>
                    <tr>
                        <td>Tiempo de Consecución</td>
                        <td colspan="2"><input type="text" class="formText" name="tiempo_consecucion" id="tiempo_consecucion"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" class="white" name="crear_proyecto" id="send_project" value="CREAR PROYECTO"></td>
                    </tr>
                    <input type="text" name="rutaimagen" id="rutaimagen" value=<?php echo '"' . $ruta_imagen . '"' ?> hidden>
                </table>

        </div>
    </div>

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
</body>

</html>