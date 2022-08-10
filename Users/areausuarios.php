<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(DB_PATH.'db.php');
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!--TÍTULO-->
        <title>PAX | DIGITAL MINDS</title>
        <!--ICONO-->
        <link rel="icon" type="favicon/x-icon" href="../images/icon.png" />
        <!--LLAMADA A LAS HOJAS DE ESTILO-->
        <link rel="stylesheet" type="text/css" href="../stylesheets/General.css" />
        <link rel="stylesheet" type="text/css" href="../stylesheets/areausuarios.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

        <!--LLAMADA A LOS SCRIPTS-->
        <script src="../scripts/RRSS.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script type="text/javascript" src="../scripts/datepicker.js"></script>

        <!--METADATOS-->
        <?php include('partials/meta.html'); ?>

    </head>    
    <body>
        <!--INICIO DE LA CABECERA-->
            <?php include(PARTIALS_PATH.'header.html'); ?>
        
        <!--INICIO DE SECCION: CARGAMOS EL AREA DE USUARIO O EL LOGIN SEGÚN SE HAYA INCIADO SESION O NO-->
            <section>
            <?php 
            session_start();
            if(@$_SESSION["valido"]!="SI"){
                include("login/login.html");
            }else{

                switch ($_SESSION['rol']) {
                    case 'ADMIN':
                        echo "
                    <section class='wrap wrap-content'><h2>Area Administradores</h2>
                    <section class='info'>
                        <!--INICIO DEL BANNER-->
                        <div id='banner'><h2>Bienvenido a tu área personal</h2></div>
                    </section>
                    <div class='panel'>
                    <h1>Bienvenid@, ".$_SESSION['nombre']." ".$_SESSION['apellido']."</h1>";
                    include(ADMIN_PATH.'admin-site.php');
                    echo "</div></section>";
                        break;
                    case 'USER':
                        echo "
                    <section class='wrap wrap-content'><h2>Area Usuarios</h2>
                    <section class='info'>
                        <!--INICIO DEL BANNER-->
                        <div id='banner'><h2>Bienvenido a tu área personal</h2></div>
                    </section>
                    <div class='panel'>
                    <p><h1>Bienvenid@, ".$_SESSION['nombre']." ".$_SESSION['apellido']."</h1><br/>";
                    include(CLIENT_PATH.'client-site.php');
                    echo "</div></section>";
                        break;
                    
                    default:
                        include(USERS_PATH.'cerrarSesion.php');
                        echo "<script>
                        $(document).ready(function({
                            $('errorMsg').html('<span class=`nvaliduser`>Error en el proceso, contacta con el administrador</span>');
                        });
                        </script>
                        ";

                        break;
                }
            }
            ?> 
            </section>
            <div id="errorMsg"></div>
        <!--PIE DE PÁGINA-->
            <?php include('partials/footer.html'); ?>   

    </body>
</html>