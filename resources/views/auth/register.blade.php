@extends('layouts.plantilla')
@section('seccion')
        <!-- Inicia Contenido -->
        <div class="contenido">
            <div class="login">
                <div class="row">
                    <h3>Registrate</h3>
                    <form class="col s12" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        {{-- Token para que laravel tome como valido este form --}}
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" type="text" value="{{old('ape1')}}" class="validate" name="ape1">
                                <label for="first_name">{{'Primer Apellido'}}</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" type="text" value="{{old('ape2')}}" class="validate" name="ape2">
                                <label for="last_name">{{'Segundo Apellido'}}</label>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="input-field col s12">
                                <input id="Nombre" type="text" value="{{old('nom')}}" class="validate" name="nom" >
                                <label for="Nombre">{{'Nombre Completo'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Num" type="text" value="{{old('telefono')}}" class="validate" name="telefono">
                                <label for="Num">{{'Numero de telefono'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" value="{{old('email')}}" class="validate" name="email">
                                <label for="email">{{'Email'}}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password">
                                <label for="password">{{'Password'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="validate" name="password_confirmation">
                                <label for="password">{{'Confirmar Password'}}</label>
                            </div>
                        </div>
<center>
  <button type="submit" class="btn" >
    Enviar
  </button>
</center>

        
                    </form>
                </div>


            </div>
        </div>
        <!-- Termina contenido -->
@endsection