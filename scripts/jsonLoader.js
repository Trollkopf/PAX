function httpGet(theUrl){
let xmlHttp = new XMLHttpRequest();
xmlHttp.open("GET", theUrl, false); 
xmlHttp.send(null);
return xmlHttp.responseText;
}

function httpGetAsync(theUrl, newsLoader){
let xmlHttp = new XMLHttpRequest();
xmlHttp.onreadystatechange = function () {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        newsLoader(xmlHttp.responseText);
}
xmlHttp.open("GET", theUrl, true);  
xmlHttp.send(null);
}

httpGetAsync("users/helpers/cargador-noticias.php", newsLoader);

function newsLoader(datos) {

let i
vectorObj = JSON.parse(datos);
    console.log(vectorObj);

    for (i = 0; i < vectorObj.noticia.length; i++){

        //CREAMOS ARTICULO
        let articulo = document.createElement("article");

            //CREAMOS DIV "DATA"
            let divData = document.createElement("div");
            let divDataAtr = document.createAttribute("class");
            divDataAtr.value = 'data';
            divData.setAttributeNode(divDataAtr);

            //CREAMOS EL SPAN PARA LA FECHA
            let spanFecha = document.createElement("span");
            spanFecha.appendChild(document.createTextNode('Fecha: '));
            spanFecha.appendChild(document.createTextNode(vectorObj.noticia[i].fecha));

            //CREAMOS EL SPAN PARA LA CATEGORIA
            let spanCat = document.createElement("span");
            spanCat.appendChild(document.createTextNode('Categoria: '));
            spanCat.appendChild(document.createTextNode(vectorObj.noticia[i].categoria));

            //CREAMOS EL SPAN PARA AUTOR
            let spanNombre = document.createElement("span");
            spanNombre.appendChild(document.createTextNode('Por: '));
            spanNombre.appendChild(document.createTextNode(vectorObj.noticia[i].nombre));
            spanNombre.appendChild(document.createTextNode(' '));
            spanNombre.appendChild(document.createTextNode(vectorObj.noticia[i].apellido));

        //MONTAMOS EL DIV "DATA"
        divData.appendChild(spanFecha);
        divData.appendChild(spanCat);
        divData.appendChild(spanNombre);

            //CREAMOS TITULAR
            let title = document.createElement("h4");
            let titleLink = document.createElement("a");
            let titleLinkPoint = document.createAttribute("href");
                titleLinkPoint.value = '#';
                titleLink.setAttributeNode(titleLinkPoint);

                titleLink.appendChild(document.createTextNode(vectorObj.noticia[i].titular));
                title.appendChild(titleLink);

            //CREAMOS SUBTITULO
            let subtitle = document.createElement("h5");
                subtitle.appendChild(document.createTextNode(vectorObj.noticia[i].subtitulo));

            //CREAMOS CONTENEDOR Y CUERPO DE LA NOTICIA
            let noticia = document.createElement("div");
            let parrafo = document.createElement("p");
            let contId = document.createAttribute("id");

                contId.value = `n-${vectorObj.noticia[i].id}`;
                noticia.setAttributeNode(contId);
                noticia.setAttributeNode(document.createAttribute("hidden"));

                parrafo.appendChild(document.createTextNode(vectorObj.noticia[i].noticia));
                noticia.appendChild(parrafo);

            //CREAMOS BOTON DE CONTROL
            let btn = document.createElement("button");
            let btnId = document.createAttribute("id");
            let btnClass = document.createAttribute("class");

                btnId.value = `btn-${vectorObj.noticia[i].id}`;
                btnClass.value = 'boton_primario';

                btn.setAttributeNode(btnClass);
                btn.setAttributeNode(btnId);
                btn.appendChild(document.createTextNode("Ver mas"));

            //ESTRUCTURA CONTROL BOTON
            btn.addEventListener("click",()=>{
                if (noticia.hasAttribute("hidden")){
                    noticia.removeAttribute("hidden");
                    btn.innerText = "Ver menos";
                }else{
                    noticia.setAttributeNode(document.createAttribute("hidden"));
                    btn.innerText = "Ver mas";
                }               
            });

        //MONTAMOS EL ARTICULO 
        articulo.appendChild(divData);
        articulo.appendChild(title);
        articulo.appendChild(subtitle);
        articulo.appendChild(noticia);
        
        articulo.appendChild(btn);
        document.querySelector("#latestNews").appendChild(articulo);

    }

//CARGAMOS TODAS LAS NOTICIAS EN EL ASIDE
    
httpGetAsync("users/helpers/cargador-noticias-totales.php", newsLoader);

    function newsLoader(datos) {

    let i
    vectorObj = JSON.parse(datos);
                console.log(vectorObj);

        for (i = 0; i < vectorObj.noticia.length; i++){
            //CREAMOS TITULAR PARA ASIDE
            let list = document.createElement("li");
            let mtitle = document.createElement("h4");
            let mtitleLink = document.createElement("a");
            let mtitleLinkPoint = document.createAttribute("href");
                mtitleLinkPoint.value = `views/leernoticia.php?id_noticia=${vectorObj.noticia[i].id}`;
                mtitleLink.setAttributeNode(mtitleLinkPoint);

                mtitleLink.appendChild(document.createTextNode(vectorObj.noticia[i].titular));
                mtitle.appendChild(mtitleLink);
                list.appendChild(mtitle);
            document.querySelector("#masNoticias").appendChild(list);}

    }
}