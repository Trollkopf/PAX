<!-- FORMULARIO DE EDITAR CITA -->
<form method="POST" id="actualizar-<?=$cita->getID();?>" action="controllers/actualizar-citas.php">
    <tr class="edit-<?=$cita->getID();?>" hidden>
        <td colspan="2"><input type='text' name='id_cita' value='<?=$cita->getID();?>' hidden>Inserte los nuevos datos:</td>
        
        <td colspan="3"><input type='text' id='fecha-<?=$cita->getID();?>' name='fecha'></td>
        
        <td><select id='hour-<?=$cita->getID();?>' name='hour'>
            <option value='10:00'>10:00</option>
            <option value='11:00'>11:00</option>
            <option value='12:00'>12:00</option>
            <option value='13:00'>13:00</option>
            <option value='16:00'>16:00</option>
            <option value='17:00'>17:00</option>
            <option value='18:00'>18:00</option>
            <option value='19:00'>19:00</option>
        </td>

        <td><input type='text' id='observ-<?=$cita->getID();?>' name='observ' maxlength='50' placeholder='Inserte una breve observaci&oacute;n'/></td>

    <td colspan="2"><input type="submit" class="purple" name="cambiar-datos-<?=$cita->getID();?>" id="cambiar-datos" value="CAMBIAR DATOS"/></td></td>
    </tr>
    <tr class="edit-<?=$cita->getID();?>" hidden><td colspan="9"><span id='error-<?=$cita->getID();?>' class='nvaliduser'></span></td></tr>	 
    <!-- INSERTAMOS VALIDADOR DE FORMULARIO -->
    <?php include(CLIENT_PATH.'client-helpers/appointments/appointment-validator.php');?>
    
</form>