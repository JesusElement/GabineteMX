@extends('layouts.plantilla')

@section('seccion')
<?php 
    $tipo = $tip;
?>

<div class="ayuda">
    <div class="modifica">
        <p>Ultima Modificacion:</p>
        <p>6-05-2020</p>
    </div>

    <div class="opciones">
        <a class="btn btn-block"
            href="{{ url('ayuda',['tip'=>'SAC']) }}"
            id="SAC">Servicio al cliente</a>
        <a class="btn btn-block"
            href="{{ url('ayuda',['tip'=>'CONT']) }}"
            id="CONT">Contacto</a>
        <a class="btn btn-block"
            href="{{ url('ayuda',['tip'=>'ICORP']) }}"
            id="ICORP">Información Corporativas</a>
        <a class="btn btn-block"
            href="{{ url('ayuda',['tip'=>'AVP']) }}"
            id="AVP">Aviso de Privacidad</a>
        <a class="btn btn-block"
            href="{{ url('ayuda',['tip'=>'TEC']) }}"
            id="TEC">Terminos y Condiciones</a>
    </div>

    <div class="informacion" id="content">
    </div>

</div>

<script>
    var contenido = document.querySelector('#content');

    $(document).ready(function () {
        if ('<?php echo $tipo ?>' == 'SAC') {
            $('#content').load('../contenidos/SAC.html');
        }
        if ('<?php echo $tipo ?>' == 'AVP') {
            $('#content').load('../contenidos/Aviso_Privacidad.html');
        }
        if ('<?php echo $tipo ?>' == 'TEC') {
            $('#content').load('../contenidos/Ter_Condi.html');
        }
        if ('<?php echo $tipo ?>' == 'ICORP') {
            $('#content').load('../contenidos/ICOP.html');
        }
        if ('<?php echo $tipo ?>' == 'CONT') {
            $('#content').load('../contenidos/Contacto.html');
        }

        /* $("#TEC").click(function(){
             $('#content').load('contenidos/Ter_Condi.html');
         });
         $("#AVP").click(function(){
             $('#content').load('contenidos/Aviso_Privacidad.html');
         });
         $("#SAC").click(function(){
             $('#content').load('contenidos/SAC.html');
         });
         $("#CONT").click(function(){
             $('#content').load('contenidos/Contacto.html');
         });
         $("#ICORP").click(function(){
             $('#content').load('contenidos/ICOP.html');
         });*/
    });
</script>
@endsection