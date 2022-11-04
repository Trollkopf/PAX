<?php
include_once('db/db.php');
include_once('models/project.php');
include_once('helpers/curdate.php');
?>

<div class='panel'>
    <h3>CREAR PROYECTO:</h3><br />
    <form method="POST" action="helpers/nuevo-proyecto.php" enctype="multipart/form-data">
        <input type='text' id='curdate' name='curdate' value='<?php echo $CURDATE; ?>' hidden />

        <table border='1' cellpadding='4' cellspacing='2'>
            <tr>
                <td colspan="3">Inserte imagen y nombre del proyecto</td>
            </tr>
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
    </form><br />
</div>