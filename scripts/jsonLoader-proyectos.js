function httpGet(theUrl){
let xmlHttp = new XMLHttpRequest();
xmlHttp.open("GET", theUrl, false); 
xmlHttp.send(null);
return xmlHttp.responseText;
}

function httpGetAsync(theUrl, projectLoader){
let xmlHttp = new XMLHttpRequest();
xmlHttp.onreadystatechange = function () {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        projectLoader(xmlHttp.responseText);
}
xmlHttp.open("GET", theUrl, true);  
xmlHttp.send(null);
}

httpGetAsync("../users/controllers/cargador-proyectos.php", projectLoader);

function projectLoader(datos) {

let i
vectorObj = JSON.parse(datos);
    console.log(vectorObj);

    for (i = 0; i < vectorObj.proyecto.length; i++){

        //CREAMOS PROYECTO

        // let enlace = document.createElement("a");

        //     //CREAMOS LA SECCION DE INFORMACION DEL PROYECTO
            let tituloProyecto = document.createAttribute("title");

            tituloProyecto.value = 'PROYECTO: ' + vectorObj.proyecto[i].nombre + 
                                   '<br/>Tecnología usada:' + vectorObj.proyecto[i].tecnologia + 
                                   '<br/>Tiempo de consecución: ' + vectorObj.proyecto[i].tiempo + 
                                   '<br/>Información: ' + vectorObj.proyecto[i].datos;
            
        //     //CREAMOS EL HREF
        //     let dirImagen = document.createAttribute('href');
        //     dirImagen.value = '../' + vectorObj.proyecto[i].imagen;

        //     //CREAMOS LA CLASE
        //     let classProyecto = document.createAttribute('class');
        //     classProyecto.value = 'slider-item';

        //     //MONTAMOS EL ENLACE
        //     enlace.setAttributeNode(tituloProyecto);
        //     enlace.setAttributeNode(dirImagen);
        //     enlace.setAttributeNode(classProyecto);
            
            //CREAMOS LA IMAEGEN DEL PROYECTO
            let imagen = document.createElement('img');
            let altImagen = document.createAttribute('alt');
            altImagen.value = vectorObj.proyecto[i].nombre;

            let srcImagen = document.createAttribute('src');
            srcImagen.value = '../' + vectorObj.proyecto[i].imagen;

            let classImagen = document.createAttribute('class');
            classImagen.value = 'slider-item';

            // MONTAMOS IMAGEN
            imagen.setAttributeNode(altImagen);
            imagen.setAttributeNode(tituloProyecto);
            imagen.setAttributeNode(srcImagen);
            imagen.setAttributeNode(classImagen);

        //MONTAMOS EL PROYECTO
        document.querySelector("#slider-container").appendChild(imagen);

    }

}