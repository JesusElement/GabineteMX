$(document).ready(function() {
    M.AutoInit();
<<<<<<< HEAD
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {
        'coverTrigger': false
    });
    //Esto es para que los filtros funcionen
    //Chekets de  filtros con jQuey
=======
  

// CAROUSEL

var carousel = jQuery('.carousel');
    carousel.carousel({
      fullWidth: true,
      indicators: true,
      duration: 300,
      onCycleTo : function($current_item, dragged) {
        console.log($current_item);
        stopAutoplay();
        startAutoplay(carousel);
      }
    });

var autoplay_id;
function startAutoplay($carousel) {
   autoplay_id = setInterval(function() {
      $carousel.carousel('next');
    }, 5000); // every 5 seconds
  //console.log("starting autoplay");
}

function stopAutoplay() {
  if(autoplay_id) {
    clearInterval(autoplay_id);
    //console.log("stoping autoplay");
  }
}
>>>>>>> 5fe290230f755b4e325e330ee3f12c3a033f83ec
    //NOMOVER
    $(function() {
        $("#tablaproductos").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
    });
    $(function() {
        $("#tablapromociones").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
    });
    $(function() {
        $("#tablaproveedores").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
    });



});


window.onload = function() {

    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if (dia < 10) dia = "0" + dia; //agrega cero si el menor de 10
    if (mes < 10) mes = "0" + mes; //agrega cero si el menor de 10
    document.getElementById("fech_ini").value = ano + "-" + mes + "-" + dia;

    var x = new Date(); //Fecha termino
    var mest = x.getMonth() + 1; //obteniendo mes
    var diat = x.getDate() + 1; //obteniendo dia
    var anot = x.getFullYear(); //obteniendo año
    if (diat < 10) diat = "0" + diat; //agrega cero si el menor de 10
    if (mest < 10) mest = "0" + mest; //agrega cero si el menor de 10
    document.getElementById("fech_ter").value = anot + "-" + mest + "-" + diat;

};

$(window).on("load", function() {
    setTimeout(function() {
        $(".master").css({ visibility: "hidden", opacity: "0" }).fadeOut("slow");
    }, 3990);
});
$(window).on("load", function() {
    setTimeout(function() {
        $(".loader").css({ visibility: "hidden", opacity: "0" }).fadeOut("slow");
    }, 4000);


    $("body").css("overflow-x", "auto");
    $("html").css("overflow-x", "auto");
    $("body").css("width", "100%");
    $("html").css("width", "100%");


});

// getHours()	Devuelve la hora (entre el 0 y el 24)
// getMinutes()	Devuelve los minutos (desde 0 a 59)
// getSeconds()	Devuelve los segundos (desde 0 a 59)

function ShowSelected() {
    var cod = document.getElementById("id_produc").value;
    var label = document.querySelector("#id_p");
    label.value = cod;
}

$(document).ready(function() {
    $('.materialboxed').materialbox();
});

