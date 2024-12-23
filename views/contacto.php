<!DOCTYPE html>
<html lang="es">
  <?php
    $basePath = '../';
    include "{$basePath}src/partials/head.php";
  ?>
  <body class="flex flex-col min-h-screen bg-gray-100">
    <?php include "{$basePath}src/partials/header.php"; ?>

    <!-- Sección de Contacto -->
    <main class="container mx-auto my-10 px-4 flex-grow">
      <h2 class="text-3xl font-bold text-teal-700 text-center mb-8">Contacto</h2>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Mapa -->
        <div>
          <h3 class="text-xl font-bold text-teal-600 mb-4">Ubicación</h3>
          <div id="map" class="w-full h-96 bg-gray-200 rounded-lg shadow-md"></div>
        </div>

        <!-- Formulario de Contacto -->
        <div>
          <h3 class="text-xl font-bold text-teal-600 mb-4">Envíanos un Mensaje</h3>
          <form action="#" method="post" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
              <label for="name" class="block text-gray-700 font-semibold">Nombre</label>
              <input
                type="text"
                id="name"
                name="name"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
                placeholder="Tu nombre"
                required
              />
            </div>
            <div class="mb-4">
              <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
              <input
                type="email"
                id="email"
                name="email"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
                placeholder="Tu correo electrónico"
                required
              />
            </div>
            <div class="mb-4">
              <label for="message" class="block text-gray-700 font-semibold">Mensaje</label>
              <textarea
                id="message"
                name="message"
                rows="5"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
                placeholder="Tu mensaje"
                required
              ></textarea>
            </div>
            <button
              type="submit"
              class="w-full bg-teal-600 text-white py-3 rounded-md hover:bg-teal-700 transition"
            >
              Enviar
            </button>
          </form>
        </div>
      </div>
    </main>

    <?php include $basePath . 'src/partials/footer.php'; ?>

    <!-- Scripts -->
    <script src="<?= $basePath ?>scripts/contact.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW2fSc43cKOZDCuSncDzJ73qrqQ5uLYxs&callback=initMap"></script>
    <script>
      // Inicialización del mapa
      function initMap() {
        const location = { lat: 38.7934, lng: -0.1627 }; // Coordenadas de ejemplo
        const map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: location,
        });
        const marker = new google.maps.Marker({
          position: location,
          map: map,
        });
      }

      // Llama a la función de inicialización
      window.onload = initMap;
    </script>
  </body>
</html>
