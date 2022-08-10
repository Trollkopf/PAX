//VARIABLES COMUNES
var mapa;
var mostrar_direcciones;
var punto;

//CARGAMOS EL MAPA
function cargarmapa() {
    //CARGAMOS DIRECTIONS RENDERER
    mostrar_direcciones = new google.maps.DirectionsRenderer();

    //VARIABLE DE COORDENADAS
    punto = new google.maps.LatLng(38.78588152415297, 0.1631419334818177);

    //VARIABLE DE OPCIONES
    var opciones = { zoom: 18, center: punto, mapTypeID: google.maps.MapTypeId.ROADMAP };

    //VARIABLE MAPA Y DONDE LO CARGAMOS
    mapa = new google.maps.Map(document.getElementById("map"), opciones);
    mostrar_direcciones.setMap(mapa);
    mostrar_direcciones.setPanel(document.getElementById("ruta"));

    //MARCA DE LA EMPRESA
    var marca = new google.maps.Marker({ position: punto, map: mapa, title: "marca1" });
    var info = new google.maps.InfoWindow({ content: 'Empresa: <b>PAX|DIGITAL MINDS</b><br /> Telefono: 665431648<br /> Direccion: Avenida de palmela, 19' });
    google.maps.event.addListener(marca, 'click', function () { info.open(mapa, marca); });
}

function calcularRuta() {
    var servicios_rutas = new google.maps.DirectionsService();

    var partida = document.getElementById("partida").value;
    var destino = punto;
    var opciones = {
        origin: partida,
        destination: destino,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };

    servicios_rutas.route(opciones, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            mostrar_direcciones.setDirections(response);
        } else {
            alert('No se ha encontrado esa localizacion : ' + status);
        }
    });
}