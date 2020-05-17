@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
  <div class="Carrito">
    <div class="marizq">

    </div>
    <div class="tituloCarrito">
<h3>Carrito</h3>
<hr>
    </div>
    <div class="imagenCarrito">

      @foreach ($Carrito as $q)
      <div class="carritoCardCss z-depth-2">
        <div class="carritoCardImgCss">
        <img class="carritoImgCss"
        src="/Imagenes/Productos/{{ $q->nom_fami }}/{{ $q->nom }}/{{ $q->id_produc }}/1.jpg"
        alt="">
      </div>
      <div class="carritoCardInfoCss">
        <h5 class="titulo">{{$q->titulo}}</h5>
      <p>{{$q->nom}}</p>
    </div>
      <div class="carritoEliPreCss">
        <b class="precio">{{$q->prec_uni}}</b>
    <a class="Eli" href="{{ url("EliCarrito/{$q->id_produc}")}}">Eliminar</a>

    </div>
   
      </div>

    
      @endforeach
    </div>
    <div class="opCarrito">
  <div class="col s12 m7">
    <h5 class="header white">Comprar</h5>
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
       {{ Auth::user()->nom }}
       {{ Auth::user()->id_cliente }}
        </div>
        <div class="card-action">
          <a class="btn" href="#">Proceder al pago</a>
        </div>
      </div>
    </div>
  </div>
    </div>
    <div class="marder">
asdf
    </div>
  </div>
</div>
@endsection