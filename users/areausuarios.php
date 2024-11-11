<?php
session_start();
include_once('db/db.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- TÍTULO E ICONO -->
    <title>PAX | DIGITAL MINDS</title>
    <link rel="icon" type="favicon/x-icon" href="../images/icon.png" />

    <!-- LLAMADA A LAS HOJAS DE ESTILO -->
    <link rel="stylesheet" type="text/css" href="../stylesheets/General.css" />
    <link rel="stylesheet" type="text/css" href="../stylesheets/areausuarios.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- LLAMADA A LOS SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="../scripts/rrss.js"></script>
    <script src="../scripts/datepicker.js"></script>

    <!-- METADATOS -->
    <?php include('partials/meta.html'); ?>
</head>

<body>
    <!-- CABECERA -->
    <?php include('partials/header.html'); ?>

    <!-- SECCIÓN PRINCIPAL -->
    <section>
        <?php
        if (!isset($_SESSION["valido"]) || $_SESSION["valido"] !== "SI") {
            include("login/login.php");
        } else {
            switch ($_SESSION['rol']) {
                case 'ADMIN':
                    include('partials/panelsuperior.php');
                    include('admin/admin-site.php');
                    break;

                case 'USER':
                    include('partials/panelsuperior.php');
                    include('client/client-site.php');
                    break;

                default:
                    // Destruir la sesión y mostrar error en caso de rol desconocido
                    session_unset();
                    session_destroy();
                    echo "<script>
                        $(document).ready(function() {
                            $('#errorMsg').html('<span class=\"invaliduser\">Error en el proceso, contacta con el administrador</span>');
                        });
                    </script>";
                    break;
            }
        }
        ?>
    </section>

    <!-- MENSAJE DE ERROR -->
    <div id="errorMsg"></div>

    <!-- PIE DE PÁGINA -->
    <?php include('partials/footer.html'); ?>

</body>

</html>