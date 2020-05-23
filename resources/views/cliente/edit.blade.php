@extends('layouts.plantilla')

@section('seccion')

<div class="OpcionesCuen">
    <div class="opcionCu">
        <div class="ImgInfo">
            <div class="ImgC">
                <a href="{{ route('CuentaCli') }}" class="btn btn-info regresa">Regresar</a>
                <img src="../../Imagenes/Clientes/fotoDe.jpg">
            </div>
            <div class="InfoC">
                <h6>
                    Nombre: {{ auth()->user()->nom }} {{ auth()->user()->ape1 }} {{ auth()->user()->ape2 }}
                </h6>
                <p>
                    Correo: <b>{{ auth()->user()->email }}</b>
                </p>
                <p>
                    Telefono: <b>{{ auth()->user()->telefono }}</b>
                </p>
            </div>

        </div>

        <div class="opcionesMPC">
            <div class="opcion3">
                <form
                    action="{{ route('EditCiente',['id'=>auth()->user()->id_cliente]) }}"
                    method="POST">
                    @csrf
                    <fieldset>
                        <legend>Informacion</legend>
                        <div class="formularioEdit">
                            <div class="NombreApe">
                                <label for="nom">Nombre</label>
                                <input type="text" name="nom" id="nom" value="{{ auth()->user()->nom }} "
                                    class="validate">
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <label for="nom">Apellido Paterno</label>
                                <input type="text" name="ape1" id="ape1" value="{{ auth()->user()->ape1 }} ">
                                @error('ape1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <label for="nom">Apellido Materno</label>
                                <input type="text" name="ape2" id="ape2" value="{{ auth()->user()->ape2 }}">
                                @error('ape2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                            </div>

                            <div class="CorreoTele">
                                <label for="nom">Telefono</label>
                                <input type="text" name="telefono" id="telefono"
                                    value="{{ auth()->user()->telefono }}">
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <label for="nom">Correo</label>
                                <input type="text" name="email" id="email" value="{{ auth()->user()->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <button type="submit" class="btn btn-dark"> Guardar Cambios </button>
                            </div>
                        </div>
                        </fielset>
                </form>

                <form
                    action="{{ route('EditCiente',['id'=>auth()->user()->id_cliente]) }}"
                    method="POST">
                    @csrf
                    <fieldset class="editContra">
                        <legend>Contraseña</legend>
                        <div class="formularioEdit2">
                            <div class="NombreApe">
                                <label for="password">Contraseña Actual</label>
                                <input type="password" name="password" id="password" class="validate">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <label for="newpass">Nueva contraseña</label>
                                <input type="password" name="newpass" id="newpass">
                                @error('newpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <label for="confirmpass">Confirmar contraseña</label>
                                <input type="password" name="confirmpass" id="confirmpass">
                                @error('confirmpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <br>
                                @enderror
                                <button type="submit" class="btn btn-dark"> Cambiar contraseña </button>
                            </div>
                        </div>
                        </fielset>
                </form>
            </div>

        </div>

    </div>

</div>

<!-- Modal Structure -->



@endsection