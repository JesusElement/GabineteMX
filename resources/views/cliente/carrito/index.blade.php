@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
  <div class="Carrito">
    <div class="marizq">
      @php
          $Total = 0;
      @endphp
    @foreach ($fechasAll as $fc)
        {{$fc->id_produc}}
        {{$fc->id_cliente}}
        {{$fechaI = $fc->fecha_in}}
        {{$fechaT = $fc->fecha_ter }}
    @endforeach
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
      <p>Cantidad:</p>
      <p style="display: none;">{{$H = $q->stock}}</p>
      @php
          foreach($num as $p){
              if ($q->id_produc == $p->id_produc) {
                $Num =$p->Np;
              }
          }
      @endphp
      <a  class="waves-effect waves-light btn transparent"  value="" id="quantity"><i class="b material-icons">exposure_neg_1</i></a>
        <b style="margin: 1rem; background-color: #fff;">{{$Num}}</b>
      <a  class="waves-effect waves-light btn transparent"  value="" id="quantity"><i class="b material-icons">exposure_plus_1</i></a>
    </div>
      <div class="carritoEliPreCss">
        <b class="precio">${{number_format($q->prec_uni,2)}}</b>
    <a class="Eli" href="{{ url("EliCarrito/{$q->id_produc}")}}">Eliminar</a>

    </div>
   
      </div>
    @php
        $Total = $Total + $q->prec_uni;
    @endphp
      @endforeach
    </div>
    <div class="opCarrito">
  <div class="col s12 m7">
    <h5 class="header white">Comprar</h5>
    <div class="card horizontal z-depth-3">
      <div class="card-stacked">
        <div class="card-content">
          <h6>Total:
          @php
              echo number_format($Total,2);
          @endphp
           </h6>
        </div>
        <div class="card-action">
          <a class="btn" href="#">Proceder al pago</a>
        </div>
      </div>
    </div>
  </div>
    </div>
    <div class="marder">

    </div>
  </div>
</div>
@endsection