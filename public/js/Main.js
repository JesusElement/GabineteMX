$(document).ready(function () {
  M.AutoInit();

  //Esto es para que los filtros funcionen 
  //Chekets de  filtros con jQuey
$("#buscarcheck").change(function(){
    var Mar = $( "#buscarcheck" ).val();
    var Fam = $("#NomMar").text();
    //window.alert(Mar);
    //window.alert(Fam);
    window.location="buscarproducto?marcaCheck="+Mar+"&fam="+Fam;

  //Fin de los filtros javaScrip
  });
});
$(function () {
  $("#tablaproductos").tablesorter();     //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
});
