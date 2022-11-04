<section class="wrap wrap-content">
  <h2>Area Usuarios</h2>
  <section class="info">
    <!--INICIO DEL BANNER-->
    <div id="banner">
      <h2>Area de usuarios</h2>
    </div>
  </section>

  <!--INICIO DEL FORMULARIO-->
  <div id="formulario">
    <!--DATOS PERSONALES-->
    <section>
      <div class="title">
        <h2>Datos de usuario</h2>
      </div>
      <div id="login">
        <!--FORMULARIO-->
        <form method="post" class="form" id="login" action="router/router.php">
          <label id="user-icon" class="icon">U</label>
          <div><input type="text" id="usuario" name="usuario" /></div>
          <label id="password-icon" class="icon">w</label>
          <input type="password" id="contrasena" name="contrasena" />
          <span id="respuesta"></span>

          <!--BOTONES-->
          <div class="last">
            <input type="reset" name="VaciarFormulario" id="reset" class="boton_secundario" onclick="resetear()" />
            <input type="submit" name="login" value="Acceder" class="boton_primario" id="enviar" />
            <br /><br />
            <div><a href="login/signup.php" class="newUser">
              <span class="hover-underline-animation"> Nuevo usuario</span>
              <label class="icon">j</label>
            </a></div>
            
            <?php
            $user = null;
            if (isset($_GET['usuario'])) {
              $user = $_GET['usuario'];
            }

            ?>
            <span id="error" class="nvaliduser"><?php echo ($user == 'unknown') ?  "<b>Usuario o contraseña incorrectos</b>" : "" ?></span>
          </div>
        </form>
      </div>
    </section>
  </div>
</section>