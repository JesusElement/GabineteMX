@extends('plantilla')

@section('seccion')

<div class="contenido">
            <div class="login">
                <div class="row">
                    <form class="col s12">
                      <div class="row">
                          <h3>Ingresar</h3>
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="text" class="validate">
                          <label for="icon_prefix">Correo</label>
                        </div>
                        <div class="input-field col s12">
                          <i class="material-icons prefix">https</i>
                          <input id="icon_telephone" type="password" class="validate">
                          <label for="icon_telephone">Contraseña</label>
                        </div>
                      </div>
                      <center>
                        <button class="btn waves-effect waves-light blue darken-4 btn-large " type="submit" name="action" style="width: 185px;">Enviar
                          <i class="material-icons right">send</i>
                      </center>
                      <center>
                      <br>
               <label for="">¿Aun no tienes una cuenta?</label>
               <a class="" type="submit" href="{{ url('registrar') }}">!Registrate¡</a>
                   
                      </center>
                    </form>
                  </div>
            </div>
        </div>

@endsection