<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(DB_PATH.'db.php');
    include_once(MODELS_PATH.'project.php');
    include_once(HELPERS_PATH.'projectsinfo.php');
?>

<!DOCTYPE html>

<html lang="es">
    <head>
        <!--IDIOMA DE LOS CARACTERES-->
        <meta charset="utf-8" />
        <!--TÍTULO-->
        <title>PAX | DIGITAL MINDS</title>
        <!--ICONO-->
        <link rel="icon" type="favicon/x-icon" href="../images/icon.png" />
        <!--LLAMADA A LAS HOJAS DE ESTILO-->
        <link rel="stylesheet" type="text/css" href="../stylesheets/General.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheets/visuallightbox.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheets/vlightbox.css" />
        <!--LLAMADA A LOS SCRIPTS-->
        <script src="../scripts/RRSS.js"></script>
        
        <!--LLAMADA AL API DE JQUERY-->
        <script src="../scripts/jquery.js"></script>
        
        
        <!--METADATOS-->
       <?php include(PARTIALS_PATH.'meta.html');?>
        
        
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
                    <li><a href="#" class="btn_in">PORTFOLIO</a></li>
                    <li><a href="presupuesto.html" class="btn">PRESUPUESTO</a></li>
                    <li><a href="contacto.html" class="btn">CONTACTO</a></li>
                    <li><a href="../users/areaUsuarios.php" class="users">AREA USUARIOS</a></li>
                </ul>
            </nav>
        </div>
        
        
    </header>
    
    <!--INICIO DE SECCION-->
    <section class="wrap wrap-content"><h2>PORTFOLIO</h2>
        <section class="info">
            <!--INICIO DEL BANNER-->
            <div id="banner"><h2>PORTFOLIO</h2></div>
            
        </section>
        
        <!--INICIAMOS LA GALERÍA-->
        <div id="vlightbox">
            
        <?php foreach($proyecto as $p):?>
	
	<?php $proyecto = new Proyecto($p['ID'], $p['nombre'], $p['datos'], $p['tecnologia'], $p['tiempo'], $p['imagen']);?>

            <!-- CARGAMOS DATOS DE CADA PROYECTO -->
        <a title="PROYECTO:          <?=$proyecto->getNombre_proyecto();?>
        <br/> Tecnología usada:      <?=$proyecto->getTecnologia();?>
        <br/> Tiempo de consecución: <?=$proyecto->getTiempo();?>
        <br/> Información:           <?=$proyecto->getDatos();?>"
        href="../<?=$proyecto->getImagen();?>" class="vlightbox">
        <img alt="<?=$proyecto->getNombre_proyecto();?>" src="../<?=$proyecto->getImagen();?>" /> </a>

        <?php endforeach;?>
<!--FIN DE LA GALERIA-->
</div>

<script>
    let $VisualLightBoxParams$ = { autoPlay: true, borderSize: 21, enableSlideshow: true, overlayOpacity: 0.4, startZoom: true };
</script>
<script src="../scripts/visuallightbox.js"></script>

    </section>

    <!--PIE DE PÁGINA-->
    <?php include(PARTIALS_PATH.'footer.html'); ?>   

</body>
</html>