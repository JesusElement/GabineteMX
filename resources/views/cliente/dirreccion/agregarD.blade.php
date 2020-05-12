@extends('layouts.plantilla')

@section('seccion')
<form class="Direc-mar">
    <fieldset>
    <legend>Direccion</legend>
    <div class="direccion-add">
                <div class="Alias" >
                    <label for="alias"> Alias de direccion </label>
                    <input type="text" name="alias" id="alias">
                </div>
                <div class="Espacio" >
                </div>
                <div class="Calle" >
                    <label for="alias"> Calle </label>
                    <input type="text" name="" id="">
                </div>
                <div class="Numero">
                    <label for="alias"> Numero </label>
                    <input type="text" name="NumEI" id="NumEI">
                </div>
                <div class="Estado" >
                    <label for="alias"> Estado </label>
                    <select name="estado" id="estado">
                        <option value=""></option>
                    </select>
                </div>
                <div class="Ciudad" >
                    <label for="ciudad"> Ciudad </label>
                    <select name="ciudad" id="ciudad">
                        <option value=""></option>
                    </select>
                </div>
                <div class="CodigoPost" >
                    <label for="CP"> Codigo Postal </label>
                    <input type="text" name="CP" id="CP">
                </div>
                <div class="Colonia" >
                    <label for="colonia"> Colonia </label>
                    <select name="colonia" id="colonia">
                        <option value=""></option>
                    </select>
                </div>
                <div class="CodigoPost" >
                    <label for="Refe"> Refrencia </label>
                    <input type="text" name="Refe" id="Refe">
                </div>
                <div class="boton">
                    <button type="submit" class="btn btn-info">Registrar</button>
                </div>
    </div>
    </fieldset>
</form>

@endsection