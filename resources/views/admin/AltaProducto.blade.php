@extends('plantilla')
@section('seccion')
<!-- Inicia Contenido -->
<div class="contenido">
    <div class="agregarProductoCss">
        <div class="marizq">
        </div>
        <div class="tituloCss">
            <h3>Registrar producto</h3>
        </div>
        <div class="proveCss">
            <form action="{{url ('/altaproducto')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- Token para que laravel tome como valido este form --}}
                <select name="id_provee" id="id_provee" class="form-control">
                    <option value="" selected="true" disabled="disabled">Seleccionar</option>
                    @foreach($proveedor as $id_provee)
                    <option value="{{ $id_provee->id_provee}}">{{ $id_provee->nom }}</option>
                    {{-- <option>{{ $id_provee->id_provee}}</option> --}}
                    @endforeach
                </select>
                <label>Provedores</label>
        </div>
        <div class="famProCss">
            <input id="famPro" type="text" class="validate" name="famPro" required>
            <label for="famPro">{{'familia del producto'}}</label>
        </div>
        <div class="subFamCss">
            <input id="subFam" type="text" class="validate" name="subFam" required>
            <label for="subFam">{{'Subfamilia'}}</label>
        </div>
        <div class="nomProCss">
            <input id="titulo" type="text" class="validate" name="titulo" required>
            <label for="titulo">{{'Nombre del producto'}}</label>
        </div>
        <div class="desProCss input-field ">
            <div class="input-field  col s6">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="icon_prefix2" name="Descripcion" class="materialize-textarea validate" data-length="175"
                    requiered></textarea>
                <label for="icon_prefix2">{{'Descripcion'}}</label>
            </div>
        </div>

        <div class="precioProCss">
            <input id="Precio" type="text" class="validate" name="Precio" required>
            <label for="Precio">{{'Precio'}}</label>
        </div>
        <div class="imagenProCss">
            <input id="imagen" type="text" class="validate" name="imagen" required>
            <label for="imagen">{{'Imagen (ruta)'}}</label>
        </div>
        <div class="bttnCss">
            <center>
                <button type="submit" class="btn">
                    Agregar
                </button>
            </center>
        </div>
        </form>
        <div class="marder">

        </div>
    </div>
</div>



<!-- Termina contenido -->
@endsection