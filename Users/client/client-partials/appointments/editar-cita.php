<!-- FORMULARIO DE EDITAR CITA -->
<form method="POST" id="actualizar-<?=$cita->getID();?>" action="controllers/actualizar-citas.php">
    <tr class="edit-<?=$cita->getID();?>" hidden>
        <td colspan="2"><input type='text' name='id_cita' value='<?=$cita->getID();?>' hidden>Inserte los nuevos datos:</td>
        
        <td colspan="3"><input type='text' class='datepicker' id='fecha-<?=$cita->getID();?>' name='datepicker'></td>
        <td><select id='hour-<?=$cita->getID();?>' name='hour'>
            <?php include(HELPERS_PATH.'options-horas.html');?>
        </td>

        <td><input type='text' id='observ-<?=$cita->getID();?>' name='observ' maxlength='50' placeholder='Inserte una breve observaci&oacute;n'/></td>

    <td colspan="2"><input type="submit" class="purple" name="cambiar-datos-<?=$cita->getID();?>" id="cambiar-datos" value="CAMBIAR DATOS"/></td></td>
    </tr>
    <tr class="edit-<?=$cita->getID();?>" hidden><td colspan="9"><span id='error-<?=$cita->getID();?>' class='nvaliduser'></span></td></tr>	 
    <!-- INSERTAMOS VALIDADOR DE FORMULARIO -->
    <?php include(CLIENT_PATH.'client-helpers/appointments/appointment-validator.php');?>
    
</form>