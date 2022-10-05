<?php 
    include_once('../db/db.php');
    include_once('../models/project.php'); 
    include_once('../helpers/curdate.php');
    include_once('../helpers/currentproject.php');
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
                    <li><a href="../galeria.html" class="btn">GALER&Iacute;A</a></li>
                    <li><a href="../presupuesto.html" class="btn">PRESUPUESTO</a></li>
                    <li><a href="../contacto.html" class="btn">CONTACTO</a></li>
                    <li><a href="../areausuarios.php" class="btn_in">AREA USUARIOS</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!--INICIO DE SECCION-->
    <section class="wrap wrap-content"><h2>EDITAR PROYECTO</h2>
        <section class="info">
            <!--INICIO DEL BANNER-->
            <div id="banner"><h2>EDITAR PROYECTO</h2></div>
            
        </section>
    </section>


    <div class='panel'>
        <h3> EDITAR PROYECTO </h3><br/>

        <!-- CARGAMOS LOS DATOS DEL PROYECTO -->
        <?php foreach($proyecto as $p):?>
	    <?php $proyecto = new Proyecto($p['ID_proyecto'], $p['nombre_proyecto'], $p['datos'], $p['tecnologia_empleada'], $p['tiempo_consecucion'], $p['imagen']);?>

        <!-- MOSTRAMOS LA IMAGEN DEL PROYECTO -->
        <div class="caja_centrada">
            <h4>Imagen del proyecto:</h4><br/>
            <img src='../../<?= $proyecto->getImagen();?>'/><br/><br/><br/>

            <table>
            <tr>
                <td colspan="2">¿Cambiar imagen?</td>
            </tr>
            <tr>
                <!-- EN CASO DE QUERER CAMBIAR LA IMAGEN DEL PROYECTO MOSTRAMOS EL FORMULARIO CORRESPONDIENTE -->
                <td>
                <button type='submit' class='boton_primario' id='cambiar-imagen' name='cambiar-imagen'/>Cambiar</button> 
                    <script>
                        $('#cambiar-imagen').click(function(){					
                            $('#cambiar_imagen').toggle();
                            return false;});
                    </script>
                </td>

                <!-- EN CASO DE NO QUERER CAMBIAR LA IMAGEN DEL PROYECTO AVANZAMOS AL SIGUIENTE PASO CON LOS DATOS ACTUALES -->
                <td>
                <form method="POST" action="editar-proyecto-info.php">
                    <input type="text" name="ID" value="<?=$proyecto->getID();?>" hidden>
                    <input type="text" name="nombre_imagen" value="<?=$proyecto->getNombre_proyecto();?>" hidden>
                    <input type="text" name="datos" value="<?=$proyecto->getDatos();?>" hidden>
                    <input type="text" name="tecnologia" value="<?=$proyecto->getTecnologia();?>" hidden>
                    <input type="text" name="tiempo" value="<?=$proyecto->getTiempo();?>" hidden>
                    <input type="text" name="imagen" value="<?=$proyecto->getImagen();?>" hidden>
                    <input type="submit" name="mantener_imagen" value="No cambiar" class="boton_secundario">
                </form>
                </td>
            </tr>
            </table>
        </div>
        
        <!-- FORMULARIO PARA CAMBIAR LA IMAGEN DEL PROYECTO -->
        <div id="cambiar_imagen" hidden>
            <form action="editar-proyecto-info.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="imagen" value="<?=$proyecto->getImagen();?>" hidden>
            <?php include('../admin/admin-partials/projects/editar-imagen.php');?>
            </form>
        </div>
    
        <!-- BOTON DE VOLVER ATRÁS -->
        <a href='javascript:history.back()' class="boton_secundario">VOLVER ATRÁS</a>
        <?php endforeach;?>
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
                <a href="views/avisolegal.html" class="advice">Aviso Legal</a></p>
                
                </p>&copy; PAX | DIGITAL MINDS 2022
            </div>

        </div>
    </footer>
</body>
</html>