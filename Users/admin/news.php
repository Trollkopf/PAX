<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once(HELPERS_PATH.'curdate.php');
    include_once(HELPERS_PATH.'currentuser.php');?>

<section>
    <!--REDACTAR NOTICIA-->
    <?php include (ADMIN_PATH.'admin-partials/news/escribir-noticia.php')?>
    <!--LISTAR NOTICIAS-->
    <?php include (ADMIN_PATH.'admin-partials/news/listar-noticias.php')?>
    
</section>

<!--EVITAMOS DUPLICAR NOTICIAS-->
<script>
   $(document).ready(function(){
        $("#titular").focusout(function(){
            var datos='titular='+$("#titular").val();
            var url="helpers/validators/validatenew.php";
            /*"?php echo HELPERS_PATH.'validators/validatenew.php';?"<-SEGURIDAD DE CHROME NO PERMITE*/
            var dataType="html";

            $.ajax({
                type: "POST",
                url: url,
                data: datos,

                success: function(data){
                    if(data==true){
                        $('#errornew').html("<span class='nvaliduser'>&nbsp; ¡Ya han escrito esa noticia!</span>");
                        $('#enviar_noticia').hide();

                    }else{
                    	 $('#errornew').html("<span >&nbsp;</span>");                     
                        $('#enviar_noticia').show();
                    }
                },
            });
        });
    });
</script>