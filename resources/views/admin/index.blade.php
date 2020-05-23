@extends('layouts.plantilla')

@section('seccion')
<center>
  <h1>Bienvenido al panel de administrador.</h1>
</center>
<div class="row">
  <div class="col s12 m6">
    <div class="card">
      <div class="card-image">
        <img src="Imagenes/Admin/gestionarproducto.jpg">
        <span class="card-title">Card Title</span>
      </div>
      <div class="card-content">
        <p>GESTIONAR PRODUCTOS</p>
      </div>
      <div class="card-action">
        <a onclick="window.location='{{ url('/admin/gestionarproducto') }}'">IR A GESTIOR DE
          PRODUCTOS</a>
      </div>
    </div>
  </div>

  <div class="col s12 m6">
    <div class="card">
      <div class="card-image">
        <img src="Imagenes/Admin/gestionarpromocion.jpg">
        <span class="card-title">Card Title</span>
      </div>
      <div class="card-content">
        <p>GESTIONAR OFERTAS</p>
      </div>
      <div class="card-action">
        <a onclick="window.location='{{ url('/admin/gestionpromocion') }}'">IR A GESTOR DE
          OFERTAS</a>
      </div>
    </div>
  </div>

</div>
<div class="row">
  <div class="col s12 m6">
    <div class="card">
      <div class="card-image">
        <img src="Imagenes/Admin/gestionarproveedores.jpg">
        <span class="card-title">Card Title</span>
      </div>
      <div class="card-content">
        <p>GESTIONAR PROVEEDORES</p>
      </div>
      <div class="card-action">
        <a onclick="window.location='{{ url('/admin/gestionproveedores') }}'">IR A GESTOR DE
          PROVEEDORES</a>
      </div>
    </div>
  </div>

  <div class="col s12 m6">
    <div class="card">
      <div class="card-image">
        <img src="Imagenes/Admin/gestionarsesion.jpg">
        <span class="card-title">Card Title</span>
      </div>
      <div class="card-content">
        <p>GESTIONAR SESIONES</p>
      </div>
      <div class="card-action">
        <a onclick="window.location='{{ url('cliente/sessions') }}'">IR A GESTOR DE SESIONES</a>
      </div>
    </div>
  </div>

</div>

@endsection