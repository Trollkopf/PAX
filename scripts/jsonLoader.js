//ABRIMOS EL JSON
function loadJSON(path, success, error) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        success(JSON.parse(xhr.responseText));
      } else {
        error(xhr);
      }
    }
  };
  xhr.open('GET', path, true);
  xhr.send();
}
  
//CARGAMOS EL JSON
loadJSON("resources/news.json", myData,'jsonp');
 
//INSERTAMOS EN EL ASIDE
function myData(data) {
    var i
    var string = "";
    json_object = eval(data)

    for (i = 0; i < json_object.noticia.length; i++){

        string += "<b> " + json_object.noticia[i].title + "</b><br />";
        string += "<i> " + json_object.noticia[i].body + "</i><br />";
        string += "<br /><b><i><a href='" + json_object.noticia[i].link + "' target='blank_'> Ir a noticia</a></b></i><br /><hr><br />";

    }
    document.getElementById('latestNews').innerHTML = string;

}