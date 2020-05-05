$(document).ready(function () {
  M.AutoInit();

  //Esto es para que los filtros funcionen 
  //Chekets de  filtros con jQuey

  
  $('#buscarcheck').click(function(){

    var x = $('#buscarcheck').val();
    window.alert(x);
      
    
  });


  //Fin de los filtros javaScrip
  
});

$(function () {
  $("#tablaproductos").tablesorter();     //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
});
