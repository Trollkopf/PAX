
<script>
$(document).ready(function(){
        $("#fecha-<?=$cita->getID();?>").change(function(){

            /*ACTIVAMOS TODAS LAS HORAS*/
            $("#hour-<?=$cita->getID();?> option[value='10:00']").attr("disabled", false); 
            $("#hour-<?=$cita->getID();?> option[value='11:00']").attr("disabled", false); 
            $("#hour-<?=$cita->getID();?> option[value='12:00']").attr("disabled", false); 
            $("#hour-<?=$cita->getID();?> option[value='13:00']").attr("disabled", false); 
            $("#hour-<?=$cita->getID();?> option[value='16:00']").attr("disabled", false); 
            $("#hour-<?=$cita->getID();?> option[value='17:00']").attr("disabled", false);
            $("#hour-<?=$cita->getID();?> option[value='18:00']").attr("disabled", false);
            $("#hour-<?=$cita->getID();?> option[value='19:00']").attr("disabled", false);
        
        /*CREAMOS LA FUNCION PARA DESHABILITAR TODAS LAS HORAS RESERVADAS*/        		
            var datos='datepicker='+$("#fecha-<?=$cita->getID();?>").val();
            var url="helpers/validators/validateappointment.php";
            var dataType="html";

            $.ajax({
                type: "POST",
                url: url,
                data: datos,

                success: function(data){
                    var vectorObj = JSON.parse(data);
                    var vlength = vectorObj.length;

                    let i=0;

                    while(i<vlength){
                        switch(vectorObj[i]){
                        case "10:00:00": $("#hour-<?=$cita->getID();?> option[value='10:00']").attr("disabled", true); break;
                        case "11:00:00": $("#hour-<?=$cita->getID();?> option[value='11:00']").attr("disabled", true); break;
                        case "12:00:00": $("#hour-<?=$cita->getID();?> option[value='12:00']").attr("disabled", true); break;
                        case "13:00:00": $("#hour-<?=$cita->getID();?> option[value='13:00']").attr("disabled", true); break;
                        case "16:00:00": $("#hour-<?=$cita->getID();?> option[value='16:00']").attr("disabled", true); break;
                        case "17:00:00": $("#hour-<?=$cita->getID();?> option[value='17:00']").attr("disabled", true); break;
                        case "18:00:00": $("#hour-<?=$cita->getID();?> option[value='18:00']").attr("disabled", true); break;
                        case "19:00:00": $("#hour-<?=$cita->getID();?> option[value='19:00']").attr("disabled", true); break;
                        }
                    i++;
                    }
                },
            });
        });

    $("#actualizar-<?=$cita->getID();?>").submit(function(event) {
        if($("#fecha-<?=$cita->getID();?>").val().length <= 0){ //COMPROBAMOS QUE SE HA SELECCIONADO UNA FECHA
            $("#error-<?=$cita->getID();?>").html("Debe seleccionar una fecha");
            event.preventDefault();
        }else if($("#hour-<?=$cita->getID();?>").find(":selected").prop('disabled')){ //COMPROBAMOS QUE LA HORA NO ESTE OCUPADA
            $("#error-<?=$cita->getID();?>").html("La hora seleccionada está ocupada");
            event.preventDefault();
        }else if($("#observ-<?=$cita->getID();?>").val().length <= 0){ //COMPROBAMOS QUE HAYAN ESCRITO UNA OBSERVACIÓN
            $("#error-<?=$cita->getID();?>").html("Debe indicar sus observaciones");
            event.preventDefault();
        }else{}
    });
});
</script>