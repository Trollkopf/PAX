<?php
session_start();
include_once('db/db.php');
?>

<!DOCTYPE html>
<html lang="es">
<?php
$basePath = '../';
include "{$basePath}src/partials/head.php";
?>

<body class="flex flex-col min-h-screen bg-gray-100">
    <?php include "{$basePath}src/partials/header.php"; ?>

    <!-- SECCIÓN PRINCIPAL -->
    <main class="container mx-auto my-10 px-4 flex-grow">
        <?php
        if (!isset($_SESSION["valido"]) || $_SESSION["valido"] !== "SI") {
            include("login/login.php");
        } else {
            include('partials/panelsuperior.php');

            switch ($_SESSION['rol']) {
                case 'ADMIN':
                    include('admin/admin-site.php');
                    break;

                case 'USER':
                    include('client/client-site.php');
                    break;

                default:
                    // Destruir la sesión y mostrar error en caso de rol desconocido
                    session_unset();
                    session_destroy();
                    echo '<div id="errorMsg" class="text-center text-red-500 font-semibold mt-4">
                            Error en el proceso, contacta con el administrador.
                          </div>';
                    break;
            }
        }
        ?>
    </main>

    <!-- MENSAJE DE ERROR -->
    <div id="errorMsg"></div>

    <!-- PIE DE PÁGINA -->
    <?php include $basePath . 'src/partials/footer.php'; ?>
</body>

</html>