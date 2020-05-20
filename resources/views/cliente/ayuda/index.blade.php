@extends('layouts.plantilla')

@section('seccion')
<?php 
    $tipo = $_GET['tip'] ;
?>

    <div class="ayuda">
        <div class="modifica">
            <p>Ultima Modificacion:</p>
            <p>6-05-2020</p>
        </div>

        <div class="opciones">
        <a class="btn btn-block">Servicio al cliente</a>
        <a class="btn btn-block">Contacto</a>
        <a class="btn btn-block">Información Corporativas</a>
        <a class="btn btn-block" id="SAC">Aviso de Privacidad</a>
        <a class="btn btn-block" id="TEC">Terminos y Condiciones</a>
        </div>

        <div class="informacion" id="content">
        </div>

    </div>

    <script>

var contenido = document.querySelector('#content');

$(document).ready(function() {
    if('<?php echo $tipo ?>' == 'SAC'){
        $('#content').load('contenidos/SAC.html');
    }
    if('<?php echo $tipo ?>' == 'AVP'){
        $('#content').load('contenidos/Aviso_Privacidad.html');
    }
    if('<?php echo $tipo ?>' == 'TEC'){
        $('#content').load('contenidos/Ter_Condi.html');
    }
		
        $("#TEC").click(function(){
            $('#content').load('contenidos/Ter_Condi.html');
        });
        $("#SAC").click(function(){
            $('#content').load('contenidos/Aviso_Privacidad.html');
        });
});
    </script>
@endsection