$(document).ready(function() {


    $("#blockDosRegistroUserCss").css("display", "none");
    $("#blockTresRegistroUserCss").css("display", "none");
    //   var covit  =$("#blockDosRegistroUserCss").css("display");
    //     window.alert(covit);
    $('#siguienteDos').click(function() {


        $("#blockUnoRegistroUserCss").css("display", "none");
        $("#blockDosRegistroUserCss").css("display", "grid");
    });

    $('#RegresaUno').click(function() {

        $("#blockDosRegistroUserCss").css("display", "none");
        $("#blockUnoRegistroUserCss").css("display", "grid");

    });


    $('#RegresaDos').click(function() {

        $("#blockTresRegistroUserCss").css("display", "none");
        $("#blockDosRegistroUserCss").css("display", "grid");

    });

    $('#siguienteTres').click(function() {


        $("#blockDosRegistroUserCss").css("display", "none");
        $("#blockTresRegistroUserCss").css("display", "grid");
    });

});