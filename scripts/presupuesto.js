//VALIDAR Y ENVIAR FORMULARIO
function validar() {
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    //VARIABLES
    var ok = "si";
    var mensaje = '';
    var optForm = document.forms["budget"]["producto"].selectedIndex;

    //VALIDADORES
    /*TELEFONO:*/   validPhone = /^(6|7|8|9)[0-9]{8}$/
    /*EMAIL*/       validMail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    //VALIDAR NOMBRE
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (document.getElementById('name').value == '') {
        ok = "no";
        mensaje += 'El campo "Nombre" no puede estar vacio. ';
        document.getElementById('name').style.border = "1px solid #ff0000";
        document.getElementById('nombre').style.fontWeight = "bold";

    }/*VALIDO*/ else if (isNaN(document.getElementById('name').value)){
        document.getElementById('name').style.border = "1px solid #2B0548";
        document.getElementById('nombre').style.fontWeight = "normal";

    } else {
        ok = "no";
        mensaje += 'El campo "Nombre" no puede tener numeros. ';
        document.getElementById('name').style.border = "1px solid #ff0000";
        document.getElementById('nombre').style.fontWeight = "bold";
    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////


    //VALIDAR APELLIDO
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (document.getElementById('surname').value == '') {
        ok = "no";
        mensaje += 'El campo "Apellidos" no puede estar vacio. ';
        document.getElementById('surname').style.border = "1px solid #ff0000";
        document.getElementById('apellidos').style.fontWeight = "bold";
    } /*VALIDO*/else if (isNaN(document.getElementById('surname').value)){
        document.getElementById('surname').style.border = "1px solid #2B0548";
        document.getElementById('apellidos').style.fontWeight = "normal";
    } else {
        ok = "no";
        mensaje += 'El campo "Apellidos" no puede tener numeros. ';
        document.getElementById('surname').style.border = "1px solid #ff0000";
        document.getElementById('apellidos').style.fontWeight = "bold";
    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    //VALIDAR TELEFONO
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (document.getElementById('phone').value == '') {
        ok = "no";
        mensaje += 'El campo "Telefono" no puede estar vacio. ';
        document.getElementById('phone').style.border = "1px solid #ff0000";
        document.getElementById('telf').style.fontWeight = "bold";
    } else if (!validPhone.exec(document.getElementById('phone').value)) {
        ok = "no";
        mensaje += 'El campo "Telefono" es incorrecto. ';
        document.getElementById('phone').style.border = "1px solid #ff0000";
        document.getElementById('telf').style.fontWeight = "bold";
    }/*VALIDO*/ else {
        document.getElementById('phone').style.border = "1px solid #2B0548";
        document.getElementById('telf').style.fontWeight = "normal";
    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    //VALIDAR EMAIL
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (document.getElementById('email').value == '') {
        ok = "no";
        mensaje += 'El campo "E-mail" no puede estar vacio. ';
        document.getElementById('email').style.border = "1px solid #ff0000";
        document.getElementById('correo').style.fontWeight = "bold";
    } else   if (!validMail.exec(document.getElementById('email').value)) {
        ok = "no";
        mensaje += 'El campo "E-mail" es incorrecto. ';
        document.getElementById('email').style.border = "1 px solid #ff0000";
        document.getElementById('correo').style.fontWeight = "bold";

    } /*VALIDO*/else {
        document.getElementById('email').style.border = "1 px solid #2B0548";
        document.getElementById('correo').style.fontWeight = "normal";
    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    //COMPROBAR OPCIONES DE PRESUPUESTO
    //PRODUCTO
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (optForm == null || optForm == 0) {
        ok = "no";
        mensaje += 'Elija un producto. ';
        document.forms["budget"]["producto"].style.color = "#ff0000";
        document.getElementById('product').style.fontWeight = "bold";
        
    } /*VALIDO*/else {
        document.forms["budget"]["producto"].style.color = "#2B0548";
        document.getElementById('product').style.fontWeight = "normal";
    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    //PLAZO
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (document.getElementById('term').value == 0) {
        ok = "no";
        mensaje += 'Elija un plazo de entrega. ';
        document.getElementById('plazo').style.fontWeight = "bold";
    } /*VALIDO*/else {
        document.getElementById('plazo').style.fontWeight = "normal";
    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    //ACEPTAR POLITICAS
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (document.getElementById('acceptedConditions').checked == false) {
        ok = "no";
        mensaje += 'Tiene que aceptar la politica de privacidad';
        document.getElementById('politicasdeprivacidad').style.fontWeight = "bold";
        document.getElementById('politicasdeprivacidad').style.color = "#ff0000";

    } else {
        document.getElementById('politicasdeprivacidad').style.fontWeight = "normal";
        document.getElementById('politicasdeprivacidad').style.color = "#2B0548";
    }
    
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////


    //RESPONDER
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    if (ok == "no") {
        alert(mensaje);
        ok = "si";
    } else {
        alert("FORMULARIO CORRECTO");
    }
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
     
}

//RESETEAR FORMULARIO
function restablecer() {
    document.getElementById('name').value = "";
    document.getElementById('surname').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('email').value = "";
    document.getElementById('producto').value = "";
    document.getElementById('plazo').value = 0;
    document.getElementById('extra1').checked = false;
    document.getElementById('extra2').checked = false;
    document.getElementById('extra3').checked = false;
    document.getElementById('extra4').checked = false;
    document.getElementById('extra5').checked = false;
    form.acceptedConditions.checked = false;
}

//CALCULAR TARIFA PRODUCTOS
function calculoTarifa() {
    var tarifa = 0;

    //ELECCION DE PRODUCTO
    if (document.forms["budget"]["producto"].selectedIndex == 1) {
        tarifa = 100.00;
        document.getElementById('dataBase').style.display = "";
    } else if (document.forms["budget"]["producto"].selectedIndex == 2) {
        tarifa = 100.00;
        document.getElementById('dataBase').style.display = "";
    } else if (document.forms["budget"]["producto"].selectedIndex == 3) {
        tarifa = 150.00;
        document.getElementById('dataBase').style.display = "";
    } else if (document.forms["budget"]["producto"].selectedIndex == 4) {
        tarifa = 120.00;
        document.getElementById('dataBase').style.display = "none";
        if (document.getElementById('extra3').checked == true) {
            document.getElementById('extra3').checked = false;
        }
    }


    //ELECCION DE EXTRAS
    if (document.getElementById('extra1').checked == true) {
        tarifa += 30;
    }
    if (document.getElementById('extra2').checked == true) {
        tarifa += 80;
    }
    if (document.getElementById('extra3').checked == true) {
        tarifa += 70;
    }

    //DESCUENTO SEGUN PLAZO
    var descuento = "";
      descuento = document.getElementById('term').value/10;
    console.log(descuento);
    tarifa = tarifa-(tarifa*descuento);
    


    //MOSTRAR TOTALIZACION
    console.log("tarifa: " + tarifa);
    if (isNaN(tarifa)) {
        tarifa = 0;

    } else if (tarifa == Infinity) {
        tarifa = 0;
    }
    document.getElementById('total').value = tarifa + " Euros";
}