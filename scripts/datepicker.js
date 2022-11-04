//////////////////
////DATEPICKER////
//////////////////
$(function () {
  $(".datepicker").datepicker({
    /*Cambiamos el formato al que nos es util para las sentencias SQL*/
    dateFormat: "yy-mm-dd",
    /*Ponemos lunes como primer día de la semana*/
    firstDay: 1,
    /*Evitamos que se pueda reservar en fechas pasadas*/
    minDate: 0,
    /*Evitamos que se pueda reservar más allá de 6 meses*/
    maxDate: "+6M",
    /*Quitamos los fines de semana*/
    beforeShowDay: $.datepicker.noWeekends,
    /*Ponemos los nombres de los meses en castellano*/
    monthNames: [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ],
    /*Ponemos los días de la semana y las indicaciones en castellano*/
    dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
    prevText: "Anterior",
    nextText: "Siguiente",
  });
});

///////////////////////////
//COMPROBAR HORAS LIBRES //
///////////////////////////

$(document).ready(function () {
  $("#datepicker").change(function () {
    /*ACTIVAMOS TODAS LAS HORAS*/
    $("#hour option[value='10:00']").attr("disabled", false);
    $("#hour option[value='11:00']").attr("disabled", false);
    $("#hour option[value='12:00']").attr("disabled", false);
    $("#hour option[value='13:00']").attr("disabled", false);
    $("#hour option[value='16:00']").attr("disabled", false);
    $("#hour option[value='17:00']").attr("disabled", false);
    $("#hour option[value='18:00']").attr("disabled", false);
    $("#hour option[value='19:00']").attr("disabled", false);

    /*CREAMOS LA FUNCION PARA DESHABILITAR TODAS LAS HORAS RESERVADAS*/
    var datos = "datepicker=" + $("#datepicker").val();
    var url = "helpers/validators/validateappointment.php";
    var dataType = "html";

    $.ajax({
      type: "POST",
      url: url,
      data: datos,

      success: function (data) {
        var vectorObj = JSON.parse(data);
        var vlength = vectorObj.length;

        let i = 0;

        while (i < vlength) {
          switch (vectorObj[i]) {
            case "10:00:00":
              $("#hour option[value='10:00']").attr("disabled", true);
              break;
            case "11:00:00":
              $("#hour option[value='11:00']").attr("disabled", true);
              break;
            case "12:00:00":
              $("#hour option[value='12:00']").attr("disabled", true);
              break;
            case "13:00:00":
              $("#hour option[value='13:00']").attr("disabled", true);
              break;
            case "16:00:00":
              $("#hour option[value='16:00']").attr("disabled", true);
              break;
            case "17:00:00":
              $("#hour option[value='17:00']").attr("disabled", true);
              break;
            case "18:00:00":
              $("#hour option[value='18:00']").attr("disabled", true);
              break;
            case "19:00:00":
              $("#hour option[value='19:00']").attr("disabled", true);
              break;
          }
          i++;
        }
      },
    });
  });
});
