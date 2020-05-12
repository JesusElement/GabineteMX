@extends('layouts.plantilla')

@section('seccion')

<div class="container">
    <div class="ayuda">

        <div class="opciones">
        <p> Opciones </p>
        <a class="btn btn-block">Servicio al cliente</a>
        <a class="btn btn-block">Contacto</a>
        <a class="btn btn-block">Rastrear</a>
        <a class="btn btn-block">Chat</a>
        <a class="btn btn-block">Información Corporativas</a>
        </div>

        <div class="informacion" id="content">
        <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/b61fc4e4-fd15-44e8-9d59-a754fbc23cf3">
</iframe>
        </div>
    </div>
</div>

@endsection