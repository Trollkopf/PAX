<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(HELPERS_PATH.'curdate.php');
    include_once(HELPERS_PATH.'currentuser.php');?>

<section>
    <!--NUEVO PROYECTO-->
    <?php include (ADMIN_PATH.'admin-partials/projects/crear-proyecto.php')?>
    <!--LISTAR PROYECTS-->
    <?php include (ADMIN_PATH.'admin-partials/projects/listar-proyectos.php')?>
    
</section>