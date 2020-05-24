@extends('layouts.plantilla')

@section('seccion')

<?php
    
    if(isset($id)){
        $user = auth()->user()->id_cliente;
       $id_di = $id;
        $direc = DB::select('SELECT b.*, c.estado FROM direc_cliente as a, direccion as b, estado as c WHERE a.id_direc = b.id_direc && c.id_estado = b.id_estado && a.id_cliente = ? && a.id_direc = ?', [$user,$id_di]);
        foreach($direc as $value){
            $alias = $value->alias;
            $calle = $value->calle;
            $num = $value->numero;
            $ciudad = $value->ciudad;
            $muni = $value->muni_dele;
            $colonia = $value->colonia;
            $cp = $value->cp;
        }
    }
    $estado = DB::select('SELECT * FROM `estado`'); 
    if(isset($id) && $tipo == 'update'){
?>
<form class="Direc-mar" action="{{route ('DirecUpdate',['tipo'=>'update','id'=>$id ]) }}" method="POST">

<input type="hidden" name="id" value="{{$id}}">
<?php
    }
    else{
?>
<form class="Direc-mar" action="{{route ('AddDirec') }}" method="POST">
<?php
    }
?>
    @csrf
    <fieldset>
    <legend>Direccion</legend>
    <div class="direccion-add">
                <div class="Alias" >
                
                    <label for="alias"> Alias de direccion </label>
                    <input type="text" name="alias" id="alias" value="{{ isset($alias) ? $alias : old('alias') }}">
                </div>
                <div class="Espacio" >
                    @php if(isset($_GET['create'])){
                        @endphp
                        <h5> Agrega la nueva direccion </h5>
                        @php 
                    }
                    else if (!isset($_GET['creacionT'])){
                    @endphp
                <h5> Antes de finalizar el registro ingresa una dirección </h5>
                @php 
                    }
                @endphp
                </div>
                <div class="Calle" >
                    <label for="calle"> Calle </label>
                    <input type="text" name="calle" id="calle" value="{{ isset($calle) ? $calle : old('alias') }}">
                </div>
                <div class="Numero">
                    <label for="alias"> Numero </label>
                    <input type="text" name="NumEI" id="NumEI" value="{{ isset($num) ? $num : old('alias') }}">
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
                    <input type="text" name="ciudad" id="ciudad" value="{{ isset($ciudad) ? $ciudad : old('alias') }}">
                </div>
                <div class="CodigoPost" >
                    <label for="CP"> Codigo Postal </label>
                    <input type="text" name="CP" id="CP" value="{{ isset($cp) ? $cp : old('alias') }}">
                </div>
                <div class="Colonia" >
                    <label for="colonia"> Colonia </label>
                    <input type="text" name="colonia" id="colonia" value="{{ isset($colonia) ? $colonia: old('alias') }}">
                </div>
                <div class="Referencia" >
                    <label for="Refe"> Municipio o Delegación </label>
                    <input type="text" name="MuDe" id="MuDe" value="{{ isset($muni) ? $muni : old('alias') }}">
                    <input type="hidden" name="create" value="{{ (isset($_GET['create'])) ? 1:0 }}">
                </div>
                <div class="boton">
                    <button type="submit" class="btn btn-info">Registrar</button>
                </div>
    </div>
    </fieldset>
</form>

@endsection