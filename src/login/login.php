<section class="bg-gray-100 py-10">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-teal-700 text-center mb-8">Área de Usuarios</h2>

    <!-- Banner -->
    <section class="bg-teal-600 text-white rounded-lg shadow-lg p-6 mb-10 text-center">
      <h2 class="text-xl font-semibold">Accede a tu cuenta</h2>
    </section>

    <!-- Formulario -->
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
      <h3 class="text-xl font-bold text-gray-700 mb-4">Datos de Usuario</h3>

      <form method="post" action="router/router.php" class="space-y-6">
        <!-- Usuario -->
        <div>
          <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
          <div class="mt-1">
            <input
              type="text"
              id="usuario"
              name="usuario"
              class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"
              placeholder="Escribe tu usuario"
              required
            />
          </div>
        </div>

        <!-- Contraseña -->
        <div>
          <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña</label>
          <div class="mt-1">
            <input
              type="password"
              id="contrasena"
              name="contrasena"
              class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"
              placeholder="Escribe tu contraseña"
              required
            />
          </div>
        </div>

        <input type="hidden" name="action" value="login">

        <!-- Botones -->
        <div class="flex items-center justify-between">
          <button
            type="reset"
            class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600 focus:outline-none"
            onclick="resetear()"
          >
            Vaciar
          </button>
          <button
            type="submit"
            name="login"
            class="px-4 py-2 bg-teal-600 text-white rounded-md shadow hover:bg-teal-700 focus:outline-none"
          >
            Acceder
          </button>
        </div>

        <!-- Nuevo Usuario -->
        <div class="text-center mt-6">
          <a href="login/signup.php" class="text-teal-600 hover:underline flex items-center justify-center">
            <span class="mr-2">¿Eres nuevo? Regístrate aquí</span>
            <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 001 1h2a1 1 0 100-2h-1V6z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
        
        <span id="error" class="text-red-600 text-sm font-semibold">
          <?php echo ($user == 'unknown') ? "Usuario o contraseña incorrectos" : ""; ?>
        </span>
       
      </form>
    </div>
  </div>
</section>
