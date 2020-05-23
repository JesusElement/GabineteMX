$(document).ready(function () {
  M.AutoInit();
  var elems = document.querySelectorAll(".dropdown-trigger");
  var instances = M.Dropdown.init(elems, {
    coverTrigger: false,
  });
  //Esto es para que los filtros funcionen
  //Chekets de  filtros con jQuey
  //NOMOVER
  $(function () {
    $("#tablaproductos").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
  });
  $(function () {
    $("#tablapromociones").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
  });
  $(function () {
    $("#tablaproveedores").tablesorter(); //FUNCION ORDER BY DE PRODUCTOS EN ACTPRODUCT
  });
});

window.onload = function () {
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

$(window).on("load", function () {
  setTimeout(function () {
    $(".master").css({ visibility: "hidden", opacity: "0" }).fadeOut("slow");
  }, 3990);
});
$(window).on("load", function () {
  setTimeout(function () {
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

function ShowSelected2() {
  var cod = document.getElementById("direccion").value;
  var label = document.querySelector("#id_p2");
  label.value = cod;
}

function verificar() {
  var cod = document.getElementById("direccion").value;
  var tarj = document.getElementById("tarjeta").value;
  if (cod.length == 0 && tarj.length == 0) {
    swal({
      icon: "error",
      title: "¡Error selecciona tarjeta y direccion!",
      closeOnClickOutside: false,
    });
    return false;
  } else if (cod.length == 0) {
    swal({
      icon: "error",
      title: "¡Error selecciona una direccion!",
      closeOnClickOutside: false,
    });
    return false;
  } else if (tarj.length == 0) {
    swal({
      icon: "error",
      title: "¡Error selecciona una tarjeta!",
      text: "Si no tiene agregada una, de click en agregar tarjeta",
    });
    return false;
    ///cliente/Tarjetas
  } else {
    swal({ icon: "success", title: "¡PAGADO CON EXITO!" });

    setTimeout(myFunction, 1500);
  }
}

$("#other").onchange(function () {
  $("#target").submit();
});

$(document).ready(function () {
  $(".materialboxed").materialbox();
});
