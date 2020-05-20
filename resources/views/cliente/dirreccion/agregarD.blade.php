@extends('layouts.plantilla')

@section('seccion')

<?php
    $estado = DB::select('SELECT * FROM `estado`');
?>

<form class="Direc-mar" action="{{route ('AddDirec') }}" method="POST">
    @csrf
    <fieldset>
    <legend>Direccion</legend>
    <div class="direccion-add">
                <div class="Alias" >
                    <label for="alias"> Alias de direccion </label>
                    <input type="text" name="alias" id="alias">
                </div>
                <div class="Espacio" >
                <h5> Antes de finalizar el registro ingresa una dirección </h5>
                </div>
                <div class="Calle" >
                    <label for="calle"> Calle </label>
                    <input type="text" name="calle" id="calle">
                </div>
                <div class="Numero">
                    <label for="alias"> Numero </label>
                    <input type="text" name="NumEI" id="NumEI">
                </div>
                <div class="Estado" >
                    <label for="alias"> Estado </label>
                    <select name="estado" id="estado">
                        @foreach($estado as $key)
                        <option value="{{$key->id_estado}}">{{$key->estado}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="Ciudad" >
                    <label for="ciudad"> Ciudad </label>
                    <input type="text" name="ciudad" id="ciudad">
                </div>
                <div class="CodigoPost" >
                    <label for="CP"> Codigo Postal </label>
                    <input type="text" name="CP" id="CP">
                </div>
                <div class="Colonia" >
                    <label for="colonia"> Colonia </label>
                    <input type="text" name="colonia" id="colonia">
                </div>
                <div class="Referencia" >
                    <label for="Refe"> Municipio o Delegación </label>
                    <input type="text" name="MuDe" id="MuDe">
                </div>
                <div class="boton">
                    <button type="submit" class="btn btn-info">Registrar</button>
                </div>
    </div>
    </fieldset>
</form>

@endsection