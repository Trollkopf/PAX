<?php 
    include_once ('helpers/currentuser.php');
    include_once ('helpers/curdate.php');
?>

<div class='panel'>
<h3>ESCRIBIR NUEVA NOTICIA:</h3><br/>
<form method="post" action="controllers/crear-noticia.php">
<input type='text' id='user' name='user' value='<?php echo $CURUSER;?>' hidden/>
<input type='text' id='curdate' name='curdate' value='<?php echo $CURDATE;?>' hidden/>

<!--INICIAMOS LA TABLA PARA INTRODUCIR NOTICIAS-->
    <table border='1' cellpadding='4' cellspacing='2'>
        <tr>
            <!--TITULAR-->
            <td><h4>TITULAR</h4></td>
            <td align="left">
                <input type="text" class="formText" name="titular" id="titular" placeholder="Escriba un titular">
                <span id="errornew"></span></td>	
            <!--CATEGORIA-->
            <td><h4>Categor&iacute;a</h4></td>
            <td>
                <select name="categoria" id="categoria">
                    <option value="" selected disabled>### Elija una categor&iacute;a ###</option>
                    <option value="Novedades" >Novedades</option>
                    <option value="Tecnologia">Tecnolog&iacute;a</option>
                    <option value="Proyectos">Proyectos</option>
                </select>
            </td>
            <!--BOTON-->
            <td align="right" rowspan="3">
            <input type="submit" name="enviar_noticia" id="enviar_noticia" class="purple" value="enviar">
            </td>
        </tr>
        <tr>
            <!--SUBTITULO-->
            <td><h4>SUBTITULO</h4></td>
            <td align="left" colspan="3">
            <input type="text" class="formText" name="subtitulo" id="subtitulo" placeholder="Escriba un subtitulo">
            </td>   
        </tr>
        <tr>
            <!--NOTICIA-->
            <td><h4>Noticia</h4></td>
            <td colspan="3">
            <textarea cols='90' rows='20' id='noticia' name="noticia" maxlength="65000"></textarea><br/>
            </td>
        </tr>
    </table>
</form><br/>
</div>