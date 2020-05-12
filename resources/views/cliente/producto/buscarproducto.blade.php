@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">

  <div class="buscarproductoCss">
    <div class="barraproductoCss">

      @if($Categoria ->isEmpty())
        <h4>En la sección de
          @foreach($Categoria as $item)
            <span id="NomMar">{{ $item->nom_fami }}</span>
          @endforeach
        </h4>
      @else
        <h4>
          Resultados de la busqueda: 
          @foreach ($quemarca as $mar)
        <span>{{$mar->nom}}</span>
          @endforeach
          @foreach ($quefamilia as $fam)
          <span>{{$fam->nom_fami}}</span>
            @endforeach
        </h4>
      @endif

    </div>
    <div class="filtroproductoCss">
      <h5>Opciones</h5>
      <hr>
      <h6>Marcas y otros productos:</h6>

      <div class="collection z-depth-3">
        @if (!$Marca -> isEmpty() && ! $Categoria -> isEmpty())
        @foreach($Marca as $Mar)
          @foreach($Categoria as $item)
            <a href="{{ url("buscarproducto/{$item->nom_fami}-{$Mar->nom}") }}"
              class="collection-item">{{ $Mar->nom }}</a>
          @endforeach
        @endforeach
        <h2>1</h2>

      @else
        @if(!$Marca -> isEmpty())

          @foreach($Marca as $Mar)
          <a href="{{ url("buscarproducto/{$Mar->nom}") }}"
            class="collection-item">{{ $Mar->nom }}</a>
        @endforeach
        <h2>2</h2>

        @else
        @foreach($Categoria as $item)
        <a href="{{ url("buscarproducto/{$item->nom_fami}") }}"
          class="collection-item">{{ $item->nom_fami }}</a>
      @endforeach
      <h2>3</h2>

        @endif
      @endif
      </div>
    </div>
    <div class="mostradorproductoCss">
    
      <table class="tabla" id="tablaproductos">
        <thead>
          <tr>
            <th><span>Tipo.</span></th> {{-- id_familia --}}
            <th><span>Subtipo.</span></th> {{-- clav_clas --}}
            <th><span>Provedor.</span></th> {{-- id_provee --}}
            <th><span>Nombre.</span></th> {{-- titulo --}}
            <th><span>Descripcion.</span></th> {{-- datos --}}
            <th><span>Stock.</span></th> {{-- stock --}}
            <th><span>Precio U.</span></th> {{-- prec uni --}}
          </tr>
        </thead>
        <tbody>
          @if(!$productoFamProv ->isEmpty())

            @foreach($productoFamProv as $resultados)
              <tr>
                <td>{{ $resultados->nom_fami }}</td>
                <td>{{ $resultados->name }}</td>
                <td>{{ $resultados->nom }}</td>
                <td>{{ $resultados->titulo }}</td>
                <td>{{ $resultados->datos }}</td>
                <td>{{ $resultados->stock }}</td>
                <td>{{ $resultados->prec_uni }}</td>
              </tr>

              <div class="buscarproductoCardCss z-depth-2">
                <img class="buscarproductoCardImgCss" src="/Imagenes/Productos/{{$resultados->nom_fami}}/{{$resultados->nom}}/{{$resultados->id_produc}}/1.jpg" alt="">
                <div class="buscarproductoCardInfoCss">
                  <h5 class="titlulo">{{ $resultados->titulo }}</h5>
                  <h6 class="titluloProve">{{ $resultados->nom }}</h6>
                  <h6 class="precio">{{ $resultados->prec_uni }}</h6>
                  <div class="footerCardCss">
                    <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a>                  </div>
                </div>
              </div>
            @endforeach

          @else

            @foreach($resultado as $resultados)
              <tr>
                <td>{{ $resultados->nom_fami }}</td>
                <td>{{ $resultados->name }}</td>
                <td>{{ $resultados->nom }}</td>
                <td>{{ $resultados->titulo }}</td>
                <td>{{ $resultados->datos }}</td>
                <td>{{ $resultados->stock }}</td>
                <td>{{ $resultados->prec_uni }}</td>
              </tr>
              <div class="buscarproductoCardCss z-depth-2">
                <img class="buscarproductoCardImgCss" src="/Imagenes/Productos/{{$resultados->nom_fami}}/{{$resultados->nom}}/{{$resultados->id_produc}}/1.jpg" alt="">
                <div class="buscarproductoCardInfoCss">
                  <h5 class="titlulo">{{ $resultados->titulo }}</h5>
                  <h6 class="titluloProve">{{ $resultados->nom }}</h6>
                  <h6 class="precio">{{ $resultados->prec_uni }}</h6>
                  <div class="footerCardCss">
                    <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a>                  </div>
                </div>
              </div>
            @endforeach

          @endif
        </tbody>
      </table>
    </div>
    <br>
    <br>
    <br>
    {{ $resultado->render("pagination::materialize-ui") }}
  </div>
</div>
@endsection