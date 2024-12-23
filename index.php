<!DOCTYPE html>
<html lang="es">
<?php
$basePath = '';
include "{$basePath}src/partials/head.php";
?>

<body class="flex flex-col min-h-screen bg-gray-100">
  <?php include "{$basePath}src/partials/header.php"; ?>

  <main class="container mx-auto my-10 px-4 flex-grow">
    <div class="text-center">
      <h2 class="text-3xl font-semibold text-teal-700 mb-6">
        Desarrollo de aplicaciones web y diseño de experiencia de usuario
      </h2>

      <section class="bg-gray-50 py-10">
        <div class="container mx-auto flex flex-col lg:flex-row items-center px-4">
          <!-- Texto -->
          <div class="lg:w-2/3 text-center lg:text-left">
            <h2 class="text-3xl font-bold text-teal-700 mb-4">Acerca de PAX Digital Minds</h2>
            <p class="text-gray-600 text-lg leading-relaxed">
              En <span class="text-teal-700 font-semibold">PAX Digital Minds</span>, nos especializamos en ofrecer
              soluciones digitales personalizadas para llevar tu negocio al siguiente nivel. Nuestro enfoque combina
              tecnología innovadora, diseño moderno y estrategias efectivas para garantizar que cada proyecto sea único
              y exitoso.
            </p>
            <p class="text-gray-600 text-lg mt-4 leading-relaxed">
              Con un equipo dedicado y una pasión por la excelencia, ofrecemos servicios que abarcan desde el <span
                class="text-teal-700 font-semibold">desarrollo de aplicaciones web</span> hasta la <span
                class="text-teal-700 font-semibold">automatización de procesos</span>, integraciones avanzadas y diseño
              de experiencias de usuario (UI/UX). Nuestro objetivo es ayudarte a destacar en el mundo digital.
            </p>
            <p class="text-gray-600 text-lg mt-4 leading-relaxed">
              Ya sea que necesites un sitio web llamativo, mejorar la presencia de tu negocio en línea con <span
                class="text-teal-700 font-semibold">estrategias SEO</span> o construir herramientas que optimicen tus
              operaciones, estamos aquí para hacer realidad tus ideas.
            </p>
            <p class="text-teal-700 font-semibold text-xl mt-6">
              ¡Trabajemos juntos para transformar tus ideas en resultados extraordinarios!
            </p>
          </div>

          <!-- Imagen -->
          <div class="lg:w-1/3 mt-8 lg:mt-0">
            <img src="images/index.webp" alt="Innovación y tecnología en PAX Digital Minds"
              class="rounded-lg shadow-lg">
          </div>
        </div>
      </section>


      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
        <!-- Tarjeta 1: Desarrollo Web -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-teal-500 hover:shadow-xl transition">
          <div class="flex justify-center text-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-center mt-4 text-teal-700">Desarrollo Web</h3>
          <p class="text-gray-600 text-center mt-2">
            Creación de sitios web modernos, responsivos y optimizados para ofrecer una experiencia de usuario única.
          </p>
        </div>

        <!-- Tarjeta 2: Integración de APIs -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-teal-500 hover:shadow-xl transition">
          <div class="flex justify-center text-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 7v13M8 7v13m-5-5h18" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-center mt-4 text-teal-700">Integración de APIs</h3>
          <p class="text-gray-600 text-center mt-2">
            Conecta tu negocio con servicios externos para mejorar la funcionalidad y automatización de tus procesos.
          </p>
        </div>

        <!-- Tarjeta 3: Diseño UI/UX -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-teal-500 hover:shadow-xl transition">
          <div class="flex justify-center text-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-center mt-4 text-teal-700">Diseño UI/UX</h3>
          <p class="text-gray-600 text-center mt-2">
            Diseños intuitivos y accesibles que garantizan una experiencia de usuario atractiva y fluida.
          </p>
        </div>

        <!-- Tarjeta 4: SEO y Marketing -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-teal-500 hover:shadow-xl transition">
          <div class="flex justify-center text-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v8m0-8a4 4 0 100-8 4 4 0 100 8z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-center mt-4 text-teal-700">SEO y Marketing</h3>
          <p class="text-gray-600 text-center mt-2">
            Potencia tu presencia online y atrae más clientes con estrategias de SEO y campañas de marketing digital.
          </p>
        </div>

        <!-- Tarjeta 5: Bases de Datos -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-teal-500 hover:shadow-xl transition">
          <div class="flex justify-center text-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6v14h16V6m-8 4h8M4 10h4m0 4h8m-8 4h8" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-center mt-4 text-teal-700">Bases de Datos</h3>
          <p class="text-gray-600 text-center mt-2">
            Gestión eficiente de datos para tu negocio con bases de datos seguras, escalables y personalizadas.
          </p>
        </div>

        <!-- Tarjeta 6: Automatización -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-teal-500 hover:shadow-xl transition">
          <div class="flex justify-center text-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m-4-8a8 8 0 100 16 8 8 0 100-16z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-center mt-4 text-teal-700">Automatización</h3>
          <p class="text-gray-600 text-center mt-2">
            Simplifica procesos repetitivos en tu negocio con soluciones de automatización personalizadas.
          </p>
        </div>
      </div>

  </main>

  <?php include $basePath . 'src/partials/footer.php'; ?>
</body>

</html>