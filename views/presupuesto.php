<!DOCTYPE html>
<html lang="es">
  <?php
    $basePath = '../';
    include $basePath . 'src/partials/head.php';
  ?>
  <body class="flex flex-col min-h-screen bg-gray-100">
    <?php include $basePath . 'src/partials/header.php'; ?>

    <!-- Sección de Presupuesto -->
    <main class="container mx-auto my-10 px-4 flex-grow">
      <h2 class="text-3xl font-bold text-teal-700 text-center mb-8">Presupuesto</h2>

      <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Datos de Contacto -->
        <section class="mb-8">
          <h3 class="text-xl font-semibold text-teal-700 mb-4">Datos de Contacto</h3>
          <form id="personalInfo" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label for="name" class="block text-gray-700 font-semibold">Nombre</label>
              <input
                type="text"
                id="name"
                placeholder="Inserte su nombre"
                maxlength="15"
                required
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
              />
            </div>
            <div>
              <label for="surname" class="block text-gray-700 font-semibold">Apellidos</label>
              <input
                type="text"
                id="surname"
                placeholder="Inserte sus apellidos"
                maxlength="40"
                required
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
              />
            </div>
            <div>
              <label for="phone" class="block text-gray-700 font-semibold">Teléfono</label>
              <input
                type="tel"
                id="phone"
                maxlength="9"
                required
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
              />
            </div>
            <div>
              <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
              <input
                type="email"
                id="email"
                required
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
              />
            </div>
          </form>
        </section>

        <!-- Datos del Presupuesto -->
        <section class="mb-8">
          <h3 class="text-xl font-semibold text-teal-700 mb-4">Presupuesto</h3>
          <form id="budget" class="grid grid-cols-1 gap-6">
            <div>
              <label for="producto" class="block text-gray-700 font-semibold">Producto</label>
              <select
                id="producto"
                onchange="calculoTarifa()"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
              >
                <option value="" disabled selected>Elija una opción</option>
                <option value="1">Proyecto HTML</option>
                <option value="2">Proyecto CSS</option>
                <option value="3">Aplicación Web</option>
                <option value="4">Base de datos</option>
              </select>
            </div>
            <div>
              <label for="term" class="block text-gray-700 font-semibold">Plazo</label>
              <input
                type="number"
                id="term"
                value="0"
                min="0"
                max="8"
                onchange="calculoTarifa()"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
              />
            </div>
            <div>
              <span class="block text-gray-700 font-semibold">Extras</span>
              <div class="flex items-center gap-4 mt-2">
                <label class="flex items-center gap-2">
                  <input
                    type="checkbox"
                    id="extra1"
                    onchange="calculoTarifa()"
                    class="h-5 w-5 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  CSS Dinámico
                </label>
                <label class="flex items-center gap-2">
                  <input
                    type="checkbox"
                    id="extra2"
                    onchange="calculoTarifa()"
                    class="h-5 w-5 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  Estudio UI/UX
                </label>
                <label class="flex items-center gap-2">
                  <input
                    type="checkbox"
                    id="extra3"
                    onchange="calculoTarifa()"
                    class="h-5 w-5 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  Base de Datos
                </label>
              </div>
            </div>
            <div>
              <label for="total" class="block text-gray-700 font-semibold">Presupuesto Total</label>
              <input
                type="text"
                id="total"
                disabled
                class="w-full mt-1 p-3 border border-gray-300 rounded-md bg-gray-100"
              />
            </div>
          </form>
        </section>

        <!-- Condiciones -->
        <div class="text-center">
          <label for="acceptedConditions" class="flex items-center gap-2 justify-center text-gray-700 font-semibold">
            <input
              type="checkbox"
              id="acceptedConditions"
              class="h-5 w-5 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
            />
            He leído y acepto la política de privacidad
          </label>
          <div class="flex justify-center gap-4 mt-4">
            <button
              type="reset"
              onclick="restablecer()"
              class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition"
            >
              Vaciar Formulario
            </button>
            <button
              type="button"
              onclick="validar()"
              class="bg-teal-600 text-white px-6 py-2 rounded-md hover:bg-teal-700 transition"
            >
              Enviar
            </button>
          </div>
        </div>
      </div>
    </main>

    <?php include $basePath . 'src/partials/footer.php'; ?>

    <!-- Scripts -->
    <script src="<?= $basePath ?>scripts/presupuesto.js"></script>
  </body>
</html>
