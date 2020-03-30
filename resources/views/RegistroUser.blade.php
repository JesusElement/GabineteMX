@extends('plantilla')
@section('seccion')
        <!-- Inicia Contenido -->
        <div class="contenido">
            <div class="login">
                <div class="row">
                    <h3>Registrate</h3>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                                <label for="first_name">Primer Apellido</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name">Segundo Apellido</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Nombre" type="text" class="validate">
                                <label for="Nombre">Nombre Completo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Num" type="text" class="validate">
                                <label for="Num">Numero de telefono</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate">
                                <label for="password">Password</label>
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
  <a class="btn waves-effect waves-light blue darken-4 btn-large " type="submit" name="action" href="Index.html">Enviar
    <i class="material-icons right">send</i>
    </a>
</center>
  </button>
        
                    </form>
                </div>


            </div>
        </div>
        <!-- Termina contenido -->
@endsection