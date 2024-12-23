<?php
include_once('../src/db/PDO.php');
include_once('../src/models/project.php');
include_once('../src/helpers/projectsinfo.php');
?>

<!DOCTYPE html>
<html lang="es">
  <?php
    $basePath = '../';
    include "{$basePath}src/partials/head.php";
  ?>
  <body class="flex flex-col min-h-screen bg-gray-100">
    <?php include $basePath . 'src/partials/header.php'; ?>

    <!-- Sección Portfolio -->
    <main class="container mx-auto my-10 px-4 flex-grow">
      <h2 class="text-3xl font-bold text-teal-700 text-center mb-8">Portfolio</h2>

      <!-- Galería -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($proyecto as $p) : ?>
          <?php $proyecto = new Proyecto($p['ID'], $p['nombre'], $p['datos'], $p['tecnologia'], $p['tiempo'], $p['imagen']); ?>

          <!-- Tarjeta del Proyecto -->
          <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition">
            <a href="../<?= $proyecto->getImagen(); ?>" class="vlightbox" title="
              PROYECTO: <?= $proyecto->getNombre_proyecto(); ?>
              Tecnología usada: <?= $proyecto->getTecnologia(); ?>
              Tiempo de consecución: <?= $proyecto->getTiempo(); ?>
              Información: <?= $proyecto->getDatos(); ?>">
              <img
                src="../<?= $proyecto->getImagen(); ?>"
                alt="<?= $proyecto->getNombre_proyecto(); ?>"
                class="w-full h-64 object-cover"
              />
            </a>
            <div class="p-4">
              <h3 class="text-lg font-bold text-teal-700"><?= $proyecto->getNombre_proyecto(); ?></h3>
              <p class="text-sm text-gray-600 mt-2">
                <?= $proyecto->getDatos(); ?>
              </p>
              <p class="text-sm text-gray-500 mt-2">
                <span class="font-semibold">Tecnología:</span> <?= $proyecto->getTecnologia(); ?><br>
                <span class="font-semibold">Tiempo:</span> <?= $proyecto->getTiempo(); ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </main>

    <?php include $basePath . 'src/partials/footer.php'; ?>

    <!-- Scripts -->
    <script>
      let $VisualLightBoxParams$ = {
        autoPlay: true,
        borderSize: 21,
        enableSlideshow: true,
        overlayOpacity: 0.4,
        startZoom: true
      };
    </script>
    <script src="<?= $basePath ?>scripts/visuallightbox.js"></script>
  </body>
</html>
