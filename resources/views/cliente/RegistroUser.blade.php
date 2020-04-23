@extends('plantilla')
@section('seccion')
        <!-- Inicia Contenido -->
        <div class="contenido">
            <div class="login">
                <div class="row">
                    <h3>Registrate</h3>
                    <form class="col s12" action="{{url ('/cliente')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        {{-- Token para que laravel tome como valido este form --}}
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" type="text" class="validate" name="ape1">
                                <label for="first_name">{{'Primer Apellido'}}</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate" name="ape2">
                                <label for="last_name">{{'Segundo Apellido'}}</label>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="input-field col s12">
                                <input id="Nombre" type="text" class="validate" name="nom" >
                                <label for="Nombre">{{'Nombre Completo'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Num" type="text" class="validate" name="telefono">
                                <label for="Num">{{'Numero de telefono'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email">
                                <label for="email">{{'Email'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="contra">
                                <label for="password">{{'Password'}}</label>
                            </div>
                        </div>

                        <div class="input-field col s6">
                            <select>
                                <option value="" disabled selected>Escoge tu Estado</option>
                                <option value="1">CDMX</option>
                                <option value="2">Estado de México</option>
                                <option value="3">Guadalajara</option>
                            </select>
                            <label>Solo México</label>
                        </div>

                        <div class="input-field col s6">
                            <select>
                                <option value="" disabled selected>Escoge tu municipio</option>
                                <option value="1">Tultepec</option>
                            </select>
                            <label>Municipio</label>
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