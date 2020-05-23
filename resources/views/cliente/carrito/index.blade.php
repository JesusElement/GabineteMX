@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
  <div class="Carrito">
    <div class="marizq">
      @php
        $Total = 0;
      @endphp
    </div>
    <div class="tituloCarrito">
      <h3>Carrito</h3>
      <ul>
        @if($errors->any())
          <div style="color: red !important">Verifique que los datos ingresados sean correctos</div>

          @error('cantidadCar')
            <span class="invalid-feedback" role="alert">
              <strong style="color:red">{{ $message }}</strong>
            </span>
          @enderror
        @endif
      </ul>
      <hr>
    </div>
    <div class="imagenCarrito">

      @foreach($Carrito as $q)
        <div class="carritoCardCss z-depth-2">
          <div class="carritoCardImgCss">
            <img class="carritoImgCss"
              src="/Imagenes/Productos/{{ $q->nom_fami }}/{{ $q->nom }}/{{ $q->id_produc }}/1.jpg" alt="">
          </div>
          <div class="carritoCardInfoCss">
            <h5 class="titulo">{{ $q->titulo }}</h5>
            <p>{{ $q->nom }}</p>
            <p>Cantidad:</p>
            <p style="display: none;">{{ $H = $q->stock }}</p>
            <a class="waves-effect waves-light btn transparent"
              href="{{ url("carritoMenos/{$q->id_produc}") }}" id="quantity"><i
                class="b material-icons">remove</i></a>
            <b style="margin: 1rem; background-color: #fff;">{{ $q->cantidad }}</b>
            @if($H == $q->cantidad)
              <a class="waves-effect waves-light btn transparent" disabled href="" id="quantity"><i
                  class="b material-icons">add</i></a>
              <p style="color: red;">Maximo de productos disponibles... Pronto tendremos mas.</p>
            @else
              <a class="waves-effect waves-light btn transparent"
                href="{{ url("carritoMas/{$q->id_produc}") }}" id="quantity"><i
                  class="b material-icons">add</i></a>
            @endif
          </div>
          <div class="carritoEliPreCss">
            <b class="precio">${{ number_format($q->cantidad*$q->prec_uni,2) }} x {{ $q->cantidad }}</b>
            <a class="Eli" href="{{ url("EliCarrito/{$q->id_produc}") }}">Eliminar</a>
          </div>
        </div>
        @php
          $Total = $Total + $q->prec_uni * $q->cantidad;

        @endphp
      @endforeach
    </div>
    <div class="opCarrito">
      <div class="col s12 m7">
        <h5 class="header white">Comprar</h5>
        <div class="card horizontal z-depth-3">
          <div class="card-stacked">
            <div class="card-content">
              <h6>Total: $
                @php
                  echo number_format($Total,2);
                @endphp
              </h6>
            </div>
            <div class="card-action">
              <button data-target="#procederpago"
                class="btn modal-trigger waves-effect waves-light btn  blue darken-4 btnacP">
                <i class="small material-icons left">payment</i> Proceder con el pago
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="marder">

    </div>
  </div>
</div>
@include('cliente.pago.index')
@endsection