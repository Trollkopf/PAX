<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(DB_PATH.'DB.PHP');
    include_once(MODELS_PATH.'news.php'); 
    include_once(HELPERS_PATH.'currentuser.php');
    include_once(HELPERS_PATH.'curdate.php');
    include_once(HELPERS_PATH.'currentnew.php');
?>

<div class='panel'>
<h3>ESCRIBIR NUEVA NOTICIA:</h3><br/>
<form method="post" action="TODO:controllers/editar-noticia.php">
<input type='text' id='user' name='user' value='<?php echo $CURUSER;?>' hidden/>
<input type='text' id='curdate' name='curdate' value='<?php echo $CURDATE;?>' hidden/>

<!-- INSERTAMOS DATOS DE LA NOTICIA -->
<?php foreach($noticia as $n):?>
<?php $noticia = new Noticia($n['ID'], $n['usuario'], $n['fecha'], $n['categoria'], $n['titular'], $n['subtitulo'], $n['noticia']);?>

<!--INICIAMOS LA TABLA PARA INTRODUCIR NOTICIAS-->
    <table border='1' cellpadding='4' cellspacing='2'>
        <tr>
            <!--TITULAR-->
            <td><h4>TITULAR</h4></td>
            <td align="left">
                <input type="text" class="formText" name="titular" id="titular" value='<?php echo $noticia->getTitular();?>'>
                <span id="errornew"></span></td>	
            <!--CATEGORIA-->
            <td><h4>Categor&iacute;a</h4></td>
            <td>
                <select name="categoria" id="categoria">
                    <option value="<?php echo $noticia->getCategoria();?>" selected disabled>### Elija una categor&iacute;a ###</option>
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
            <input type="text" class="formText" name="subtitulo" id="subtitulo" value='<?php echo $noticia->getSubtitulo();?>'>
            </td>   
        </tr>
        <tr>
            <!--NOTICIA-->
            <td><h4>Noticia</h4></td>
            <td colspan="3">
            <textarea cols='90' rows='20' id='noticia' name="noticia" maxlength="65000"><?php echo $noticia->getNoticia();?></textarea><br/>
            </td>
        </tr>
    </table>

<?php endforeach;?>
</form><br/>
</div>