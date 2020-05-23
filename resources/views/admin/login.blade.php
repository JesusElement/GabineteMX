@extends('layouts.plantilla')

@section('seccion')

<div class="contenido">
  <div class="login">
    <div class="row">
      <form class="col s12" method="POST" action="{{ url('/admin/login') }}"
        enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
          <h3>Login de Administrador</h3>
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" value="{{ old('email') }}" class="validate"
              name="email">
            <label for="icon_prefix">Correo</label>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">https</i>
            <input id="icon_telephone" type="password" class="validate" name="password">
            <label for="icon_telephone">Contraseña</label>
          </div>
        </div>
        <center>
          <button class="btn waves-effect waves-light blue darken-4 btn-large " type="submit" name="action"
            style="width: 185px;">Enviar
            <i class="material-icons right">send</i>
        </center>
        <center>
          <br>
          <label for="">¿Aun no tienes una cuenta?</label>
          <a class="" type="submit" href="{{ url('register') }}">!Registrate¡</a>

        </center>
      </form>
    </div>
  </div>
</div>

@endsection