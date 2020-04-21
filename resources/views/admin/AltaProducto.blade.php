@extends('plantilla')
@section('seccion')
        <!-- Inicia Contenido -->
        <div class="contenido">
            <div class="login">
                <div class="row">
                    <h3>Registrar producto</h3>
                    <form class="col s12" action="{{url ('/altaproducto')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        {{-- Token para que laravel tome como valido este form --}}
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="id_produc" type="text" class="validate" name="id_produc" required>
                                <label for="id_produc">{{'ID de producto'}}</label>
                            </div>
                            <div class="row">
                            <div class="input-field col s6">
                           
                                <select name="id_provee" id="id_provee" class="form-control">
                                    <option value="" selected="true" disabled="disabled">Seleccionar</option>
                                    @foreach($proveedor as $id_provee)
                                <option value="{{ $id_provee->id_provee}}">{{ $id_provee->nom }}</option> 
                                    {{-- <option>{{ $id_provee->id_provee}}</option> --}}
                                    @endforeach
                                   </select>

                              
                                <label>Provedores</label>
                            </div>

                        </div>
                        <div class="row"> 
                            <div class="input-field col s12">
                                <input id="titulo" type="text" class="validate" name="titulo" required>
                                <label for="titulo">{{'Nombre del producto'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="datos" type="text" class="validate" name="datos" required>
                                <label for="datos">{{'Descripcion'}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="clav_clas" type="text" class="validate" name="clav_clas" required>
                                <label for="clav_clas">{{'Clav class'}}</label>
                            </div>
                        </div>
                       
                        <center>
                            <button type="submit" class="btn" >
                           Agregar
                            </button>
                        </center>

        
                    </form>
                </div>


            </div>
        </div>
        <!-- Termina contenido -->
@endsection