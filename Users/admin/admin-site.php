    <!--BOTONES DE LAS SECCIONES--><br />
    <button type="submit" class="boton_primario" id="toggleProjects">PROYECTOS</button>
    <button type="submit" class="boton_primario" id="toggleUsers">USUARIOS</button>
    <button type="submit" class="boton_primario" id="toggleAppointments">CITAS</button>
    <button type="submit" class="boton_primario" id="toggleNews">NOTICIAS</button>
    <button type="submit" class="boton_primario" id="toggleAccount">MI CUENTA</button>
    <a href="cerrarSesion.php" class="boton_cerrar-sesion">CERRAR SESIÓN</a><br /><br />

    <!--SECCIONES-->
    <!--CARGAMOS ADMINISTRAR CUENTA-->
    <div class="info_box" id="infoaccount">
        <?php include("partials/account.php"); ?>
    </div>

    <!--CARGAMOS ADMINISTRAR USUARIOS-->
    <div class="info_box" id="infousers">
        <?php include("admin/users.php"); ?>
    </div>

    <!--CARGAMOS ADMINISTRAR CITAS-->
    <div class="info_box" id="infoappointments">
        <?php include("admin/appointments.php"); ?>
    </div>

    <!--CARGAMOS ADMINISTRAR NOTICIAS-->
    <div class="info_box" id="infonews">
        <?php include("admin/news.php"); ?>
    </div>

    <!--CARGAMOS ADMINISTRAR PROYECTOS-->
    <div class="info_box" id="infoprojects">
        <?php include("admin/projects.php"); ?>
    </div>

    <!--INCORPORACION AJAX PARA VENTANAS-->
    <script type="text/javascript">
        //BOTÓN MI CUENTA
        $(document).ready(function() {
            $('#infoaccount').hide();
            $('#toggleAccount').click(function() {

                $('#infoaccount').toggle();
                $('#infousers').hide();
                $('#infoappointments').hide();
                $('#infonews').hide();
                $('#infoprojects').hide();

                return false;
            });
        });

        //BOTON USUARIOS
        $(document).ready(function() {
            $('#infousers').hide();
            $('#toggleUsers').click(function() {

                $('#infousers').toggle();
                $('#infoaccount').hide();
                $('#infoappointments').hide();
                $('#infonews').hide();
                $('#infoprojects').hide();

                return false;
            });
        });

        //BOTON CITAS
        $(document).ready(function() {
            $('#infoappointments').hide();
            $('#toggleAppointments').click(function() {

                $('#infoappointments').toggle();
                $('#infoaccount').hide();
                $('#infousers').hide();
                $('#infonews').hide();
                $('#infoprojects').hide();

                return false;
            });
        });

        //BOTON NOTICIAS
        $(document).ready(function() {
            $('#infonews').hide();
            $('#toggleNews').click(function() {

                $('#infonews').toggle();
                $('#infoaccount').hide();
                $('#infousers').hide();
                $('#infoappointments').hide();
                $('#infoprojects').hide();

                return false;
            });
        });

        //BOTON PROYECTOS
        $(document).ready(function() {
            $('#infoprojects').show();
            $('#toggleProjects').click(function() {

                $('#infoprojects').toggle();
                $('#infousers').hide();
                $('#infoaccount').hide();
                $('#infoappointments').hide();
                $('#infonews').hide();

                return false;
            });
        });
    </script>