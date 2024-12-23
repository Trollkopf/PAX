<table border='1' cellpadding='4' cellspacing='2'>
    <tr>
        <td colspan="3">Inserte imagen y nombre del proyecto</td>
    </tr>
    <input type="text" name="ID" value="<?= $proyecto->getID(); ?>" hidden>
    <input type="text" name="datos" value="<?= $proyecto->getDatos(); ?>" hidden>
    <input type="text" name="tecnologia" value="<?= $proyecto->getTecnologia(); ?>" hidden>
    <input type="text" name="tiempo" value="<?= $proyecto->getTiempo(); ?>" hidden>
    <tr>
        <td>Imagen:</td>
        <td><input type="file" name="imagen" id="imagen"></td>
        <td rowspan="2"><input type="submit" class="white" name="send_image" id="send_image" value="Cargar imagen"></td>
    </tr>

    <tr>
        <td>Nombre Imagen:</td>
        <td><input type="Text" name="nombre_imagen" id="nombre_imagen"></td>
    </tr>
</table>