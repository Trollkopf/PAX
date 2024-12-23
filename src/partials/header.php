<header class="bg-teal-700 text-white">
  <div class="container mx-auto flex justify-between items-center py-4">
    <!-- Logotipo y título -->
    <div class="flex items-center">
      <img src="<?= $basePath ?>images/icon.png" alt="logo" class="h-12 mr-4" />
      <h1 class="text-xl font-bold">PAX | DIGITAL MINDS</h1>
    </div>

    <!-- Menú de navegación -->
    <nav class="hidden md:flex space-x-6">
      <a  href="<?= $basePath ?>index.php" class="hover:text-teal-300">INICIO</a>
      <a  href="<?= $basePath ?>views/portfolio.php" class="hover:text-teal-300">PORTFOLIO</a>
      <a  href="<?= $basePath ?>views/presupuesto.php" class="hover:text-teal-300">PRESUPUESTO</a>
      <a  href="<?= $basePath ?>views/contacto.php" class="hover:text-teal-300">CONTACTO</a>
      <a  href="<?= $basePath ?>src/areausuarios.php" class="hover:text-teal-300">AREA USUARIOS</a>
    </nav>

    <!-- Menú hamburguesa -->
    <button class="md:hidden text-white" id="hamburger">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
      </svg>
    </button>
  </div>

  <!-- Menú desplegable para móvil -->
  <div class="hidden md:hidden bg-teal-800" id="mobileMenu">
    <a  href="<?= $basePath ?>index.php" class="block py-2 px-4 hover:bg-teal-700">INICIO</a>
    <a  href="<?= $basePath ?>views/portfolio.php" class="block py-2 px-4 hover:bg-teal-700">PORTFOLIO</a>
    <a  href="<?= $basePath ?>views/presupuesto.php" class="block py-2 px-4 hover:bg-teal-700">PRESUPUESTO</a>
    <a  href="<?= $basePath ?>views/contacto.php" class="block py-2 px-4 hover:bg-teal-700">CONTACTO</a>
    <a  href="<?= $basePath ?>src/areausuarios.php" class="block py-2 px-4 hover:bg-teal-700">AREA USUARIOS</a>
  </div>
</header>

<script>
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');

  hamburger.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
