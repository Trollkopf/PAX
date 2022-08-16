<?php include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');?>
<!--BOTONES DE LAS SECCIONES-->
<button type="submit" class="boton_primario" id="toggleAppointments">MIS CITAS</button>
<button type="submit" class="boton_primario" id="toggleUser">MI CUENTA</button>
<a href="cerrarSesion.php" class="boton_cerrar-sesion">CERRAR SESIÓN</a><br/>

    <!--CARGAMOS ADMINISTRAR CITAS-->
    <div class="info_box" id="infoappointments">
        <?php include (CLIENT_PATH."appointments.php");?>  
    </div>

    <!--CARGAMOS ADMINISTRAR CUENTA-->
    <div class="info_box" id="infoaccount">
        <?php include (PARTIALS_PATH."account.php");?>
    </div>

  
<!--INCORPORACION AJAX PARA VENTANAS-->          
<script>
    //VENTANA USUARIO
    $(document).ready(function(){
    $('#infoaccount').hide();
    $('#toggleUser').click(function(){
        
        $('#infoaccount').toggle();
        $('#infoappointments').hide();

        return false;
        });
    });

    //VENTANA CITAS
    $(document).ready(function(){
    $('#infoappointments').show();
    $('#toggleAppointments').click(function(){

        $('#infoappointments').toggle();
        $('#infoaccount').hide();

        return false;
        });
    });

</script>