<?php
include_once('db/db.php');
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
    <script src="../scripts/rrss.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script type="text/javascript" src="../scripts/datepicker.js"></script>

    <!--METADATOS-->
    <?php include('partials/meta.html'); ?>

</head>

<body>
    <!--INICIO DE LA CABECERA-->
    <?php include('partials/header.html'); ?>

    <!--INICIO DE SECCION: CARGAMOS EL AREA DE USUARIO O EL LOGIN SEGÚN SE HAYA INCIADO SESION O NO-->
    <section>

        <section>
            <?php
            session_start();
            if (@$_SESSION["valido"] != "SI") {
                include("login/login.php");
            } else {

                switch ($_SESSION['rol']) {
                    case 'ADMIN':
                        include('partials/panelsuperior.php');
                        include('admin/admin-site.php');
                        echo "</div></section><br/>";
                        break;
                    case 'USER':
                        include('partials/panelsuperior.php');
                        include('client/client-site.php');
                        echo "</div></section><br/>";
                        break;

                    default:
                        include('cerrarSesion.php');
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
    </section>
    <div id="errorMsg"></div>
    <!--PIE DE PÁGINA-->
    <?php include('partials/footer.html'); ?>

</body>

</html>