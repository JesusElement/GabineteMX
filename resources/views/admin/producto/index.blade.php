@extends('layouts/plantilla')
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
                    <option value="" selected="true" disabled="disabled">Proveedor</option>
                    @foreach($proveedor ?? '' as $id_provee)
                    <option value="{{ $id_provee->id_provee}}">{{ $id_provee->nom }}</option>

                    @endforeach
                </select>
                <label>Provedores</label>
        </div>
        <div class="famProCss">
            {{-- <input id="famPro" type="text" class="validate" name="famPro" required>
            <label for="famPro">{{'familia del producto'}}</label> --}}
            <select name="id_familia" id="id_familia" class="form-control">
                <option value="" selected="true" disabled="disabled">Familia producto</option>
                @foreach($familia ?? '' as $id_familia)
                <option value="{{ $id_familia->id_familia}}">{{ $id_familia->nom_fami }}</option>

                @endforeach
            </select>
            <label>Familia prodcuto</label>

        </div>
        <div class="subFamCss">
            {{-- <input id="subFam" type="text" class="validate" name="subFam" required>
            <label for="subFam">{{'Subfamilia'}}</label> --}}

            <select name="id_clav" id="id_clav" class="form-control">
                <option value="" selected="true" disabled="disabled">Subfamilia producto</option>
                @foreach($clave ?? '' as $id_clav)
                <option value="{{ $id_clav->id_clav}}">{{ $id_clav->name }}</option>

                @endforeach
            </select>
            <label>Subfamilia producto</label>

        </div>
        <div class="nomProCss">
            <input id="titulo" type="text" class="validate" name="titulo" required>
            <label for="titulo">{{'Nombre del producto'}}</label>
        </div>
        <div class="desProCss input-field ">
            <div class="input-field  col s6">

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
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" id="imagen" name="imagen" multiple  required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Subir imagenes">
                </div>
            </div>
        </div>
        <div class="stockProCss">
            <p class="range-field">
            <input id="stock" type="text" class="validate" name="stock" required>
                <label for="range">{{'Stock'}}</label>
            </p>
        </div>
        <div class="bttnCss">
            <center>
                <button type="submit" class="btn">
                    Agregar
                </button>
            </center>
        </div>
        <br>
        <br>
        </form>
        <div class="marder">

        </div>
    </div>
</div>



<!-- Termina contenido -->
@endsection