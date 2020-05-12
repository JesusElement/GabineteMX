$(document).ready(function () {
  M.AutoInit();

  //Esto es para que los filtros funcionen
  //Chekets de  filtros con jQuey
  $("#buscarcheck").change(function () {
    var Mar = $("#buscarcheck").val();
    var Fam = $("#NomMar").text();
    //window.alert(Mar);
    //window.alert(Fam);
    window.location = "buscarproducto?marcaCheck=" + Mar + "&fam=" + Fam;

    //Fin de los filtros javaScrip
  });

  $(function () {
    $("#tablaproductos").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
  });
  $(function () {
    $("#tablapromociones").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
  });


  var h = new Date();
  var hr = h.getHours();
  var min = h.getMinutes();

  document.getElementById("hora_ini").value = hr + ":" + min;
  document.getElementById("hora_ter").value = hr + ":" + min;


  var horadeinicio = $('#hora_ini');
  var horadetermino = $('#hora_ter');

  horadeinicio.value=hr + ":" + min;
  horadetermino.value=hr + ":" + min;


});

window.onload = function () {
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth() + 1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if (dia < 10) dia = "0" + dia; //agrega cero si el menor de 10
  if (mes < 10) mes = "0" + mes; //agrega cero si el menor de 10
  document.getElementById("fech_ini").value = ano + "-" + mes + "-" + dia;

  var x = new Date(); //Fecha actual
  var mest = x.getMonth() + 1; //obteniendo mes
  var diat = x.getDate() + 1; //obteniendo dia
  var anot = x.getFullYear(); //obteniendo año
  if (diat < 10) diat = "0" + diat; //agrega cero si el menor de 10
  if (mest < 10) mest = "0" + mest; //agrega cero si el menor de 10
  document.getElementById("fech_ter").value = anot + "-" + mest + "-" + diat;

  
};




// getHours()	Devuelve la hora (entre el 0 y el 24)
// getMinutes()	Devuelve los minutos (desde 0 a 59)
// getSeconds()	Devuelve los segundos (desde 0 a 59)

function ShowSelected() {
  var cod = document.getElementById("id_produc").value;
  var label = document.querySelector("#id_p");
  label.value = cod;
}
