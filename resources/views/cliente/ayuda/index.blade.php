@extends('layouts.plantilla')

@section('seccion')


    <div class="ayuda">

        <div class="opciones">
        <a class="btn btn-block">Servicio al cliente</a>
        <a class="btn btn-block">Contacto</a>
        <a class="btn btn-block">Información Corporativas</a>
        <a class="btn btn-block" onclick="aviso()">Aviso de Privacidad</a>
        </div>

        <div class="informacion" id="content">
        </div>

    </div>

    <script>
        var contenido = document.querySelector('#content');
        function aviso(){
            fetch('contenidos/Aviso_Privacidad.txt')
            .then(data => data.text())
                //Otra promesa que captura esa data que ya viene preformateada
                .then(data => {
                    //pintamos la data
                    contenido.innerHTML = data

                })

        }
    </script>
@endsection