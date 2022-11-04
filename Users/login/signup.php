<!DOCTYPE html>

<html lang="es">

<head>
    <!--IDIOMA DE LOS CARACTERES-->
    <meta charset="utf-8" />
    <!--TÍTULO-->
    <title>PAX | DIGITAL MINDS</title>
    <!--ICONO-->
    <link rel="icon" type="favicon/x-icon" href="../../images/icon.png" />
    <!--LLAMADA A LAS HOJAS DE ESTILO-->
    <link rel="stylesheet" type="text/css" href="../../stylesheets/General.css" />
    <link rel="stylesheet" type="text/css" href="../../stylesheets/areausuarios.css" />

    <!--LLAMADA A LOS SCRIPTS-->
    <script src="../../scripts/RRSS.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <!--METADATOS-->
    <meta name="author" content="Maximiliano Serratosa" />
    <meta name="robots" content="follow" />
    <meta name="description" content="PAX | DIGITAL MINDS es tu solucion para tu aplicacion web" />
    <meta name="keywords" content="html, css, javascript, php, diseño web, ajax, mysql" />
    <meta name="revisit-after" content="7 days" />
    <meta name="category" content="Web app" />
</head>

<body>

    <!--INICIO DE LA CABECERA-->
    <header id="header">
        <div class="wrap">
            <div id="logo">
                <span class="displ"><img src="../../images/icon.png" alt="logo" /></span>
                <h1>PAX | DIGITAL MINDS</h1>
            </div>

            <!--MENÚ DE NAVEGACIÓN-->
            <nav id="menu">
                <ul>
                    <li><a href="../../index.html" class="btn">INICIO</a></li>
                    <li><a href="../../views/portfolio.php" class="btn">PORTFOLIO</a></li>
                    <li><a href="../../views/presupuesto.html" class="btn">PRESUPUESTO</a></li>
                    <li><a href="../../views/contacto.html" class="btn">CONTACTO</a></li>
                    <li><a href="#" class="btn_in">AREA USUARIOS</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section class="wrap wrap-content">
        <h2>Nuevo usuario</h2>
        <section class="info">
            <!--INICIO DEL BANNER-->
            <div id="banner">
                <h2>Nuevo usuario</h2>
            </div>
        </section>

        <!--INICIO DEL FORMULARIO-->
        <div id="formulario">
            <!--DATOS PERSONALES-->
            <section>
                <div class="title">
                    <h2>Datos del nuevo usuario</h2>
                </div>
                <div id="signup">

                    <form class="form" action="../router/router.php" id="signup" method="post">
                        <!--USUARIO-->
                        <label id="user-icon" class="icon">U</label>
                        <div><input type="text" name="usuario" id="usuario" placeholder="Inserte su nombre de usuario"></div>

                        <!--NOMBRE-->
                        <label id="user-icon" class="icon">U</label>
                        <div><input type="text" name="nombre" id="nombre" placeholder="Inserte su nombre "></div>

                        <!--APELLIDO-->
                        <label id="user-icon" class="icon">U</label>
                        <div><input type="text" name="apellido" id="apellido" placeholder="Inserte su apellido"></div>

                        <!--CONTRASEÑA-->
                        <label id="password-icon" class="icon">w</label>
                        <div><input type="password" name="contrasena" id="contrasena" placeholder="Inserte su contraseña"></div>

                        <!--EMAIL-->
                        <label id="email-icon" class="icon">@</label>
                        <div><input type="email" name="email" id="email" placeholder="Inserte su E-mail"></div>

                        <!--TELEFONO-->
                        <label id="telf-icon" class="icon">¹</label>
                        <div><input type="tel" name="telefono" id="telefono" placeholder="Inserte su tel&eacute;fono"></div>

                        <div class="last">

                            <input type="reset" name="VaciarFormulario" id="reset" class="boton_secundario" onclick="resetear()" />
                            <input type="submit" name="signup" value="Enviar" class="boton_primario" id="enviar">
                            <br /><br /><a href='../areausuarios.php' class="boton_secundario" id="back_button">VOLVER ATRÁS</a>

                            <?php
                            $registro = null;
                            $advertencia = null;
                            if (isset($_GET['registro'])) {
                                $registro = $_GET['registro'];
                                switch ($registro) {
                                    case ("usuario"):
                                        $advertencia = "Usuario ya registrado";
                                        break;
                                    case ("email"):
                                        $advertencia = "Email ya registrado";
                                        break;
                                    case ("telefono"):
                                        $advertencia = "Teléfono ya registrado";
                                        break;
                                }
                            }

                            ?>

                            <br /><br /><span id="error" class="nvaliduser"><?php echo $advertencia ?></span>
                        </div>


                    </form>

                </div>

            </section>
        </div>
    </section>

    <script>
        $("form").submit(function(event) {

            let $usuario = $('#usuario');
            let $nombre = $('#nombre');
            let $apellido = $('#apellido');
            let $contraseña = $('#contrasena');
            let $email = $('#email');
            let $telefono = $('#telefono');

            if ($usuario.val().length <= 0) { //COMPROBAMOS QUE USUARIO NO ESTÉ VACÍO
                $('#error').html('Debe rellenar el campo <b>USUARIO</b>');
                event.preventDefault();
            } else if ($nombre.val().length <= 0) { //COMPROBAMOS QUE EL NOMBRE NO ESTÉ VACÍO
                $('#error').html('Debe rellenar el campo <b>NOMBRE</b>');
                event.preventDefault();
            } else if ($apellido.val().length <= 0) { //COMPROBAMOS QUE EL APELLIDO NO ESTÉ VACÍO
                $('#error').html('Debe rellenar el campo <b>APELLIDO</b>');
                event.preventDefault();
            } else if ($contrasena.val().length <= 0) { //COMPROBAMOS QUE LA CONTRASEÑA NO ESTÉ VACÍA
                $('#error').html('Debe rellenar el campo <b>CONTRASEÑA</b>');
                event.preventDefault();
            } else if ($email.val().length <= 0) { //COMPROBAMOS QUE EL EMAIL NO ESTÉ VACÍO
                $('#error').html('Debe rellenar el campo <b>EMAIL</b>');
                event.preventDefault();
            } else if ($telefono.val().length <= 0) { //COMPROBAMOS QUE EL TELÉFONO NO ESTÉ VACIO
                $('#error').html('Debe rellenar el campo <b>TELEFONO</b>');
                event.preventDefault();
            } else {
                $('#error').html('')
            }
        });
    </script>
</body>

<!--PIE DE PÁGINA-->
<div class="clearfix"></div>
<footer id="footer">

    <div class="wrap">

        <div>
            <h5>PAX | DIGITAL MINDS</h5>
            <!--DIRECCION-->
            Avenida de Palmela 19 - 03730 J&aacute;vea (Alicante)<br />
            <!--AVISO LEGAL-->
            <p>
                <a href="#" class="advice">Política de cookies</a>&nbsp; | &nbsp;
                <a href="#" class="advice">Política de privacidad</a>&nbsp; | &nbsp;
                <a href="views/avisolegal.html" class="advice">Aviso Legal</a>
            </p>
            <!--RRSS-->
            <p>
                <a href="#" class="rrss" onmouseover="fbhover()" onmouseout="fbblack()"><img id="fb" alt="Facebook" src="../../images/rrss/facebook.png" /></a> &nbsp;
                <a href="#" class="rrss" onmouseover="ighover()" onmouseout="igblack()"><img id="ig" alt="Instagram" src="../../images/rrss/instagram.png" /></a> &nbsp;
                <a href="#" class="rrss" onmouseover="twhover()" onmouseout="twblack()"><img id="tw" alt="twitter" src="../../images/rrss/twitter.png" /></a>
            </p>&copy; PAX | DIGITAL MINDS 2022
        </div>

    </div>
</footer>


</html>