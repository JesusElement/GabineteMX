@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">

  <div class="buscarproductoCss">
    <div class="barraproductoCss">

      <h4>
        Resultados de la busqueda:
        @if(!$quefamilia -> isEmpty())

          @foreach($quefamilia as $fam)
            <span>{{ $fam->nom_fami }}</span>
          @endforeach
       
        @else

          @foreach($quemarca as $mar)
            <span>{{ $mar->nom }}</span>
          @endforeach
      
        @endif
      </h4>


    </div>
    <div class="filtroproductoCss">
      <h5>Opciones</h5>
      <hr>
      <h6>Marcas y otros productos:</h6>

      <div class="collection z-depth-3">
        @if(!$Marca -> isEmpty() && ! $Categoria -> isEmpty())
          @foreach($Marca as $Mar)
            @foreach($Categoria as $item)
              <a href="{{ url("buscarproducto/{$item->nom_fami}-{$Mar->nom}") }}"
                class="collection-item">{{ $Mar->nom }}</a>
            @endforeach
          @endforeach
   
        @else
          @if(!$Marca -> isEmpty())
            @foreach($quefamilia as $fam)
              @foreach($Marca as $Mar)
                <a href="{{ url("buscarproducto/{$fam->nom_fami}-{$Mar->nom}") }}"
                  class="collection-item">{{ $Mar->nom }}</a>
              @endforeach
            @endforeach
     
          @else
            @foreach($Categoria as $item)
              <a href="{{ url("buscarproducto/{$item->nom_fami}") }}"
                class="collection-item">{{ $item->nom_fami }}</a>
            @endforeach
         

          @endif
        @endif
      </div>
    </div>
    <div class="mostradorproductoCss">

      @if(!$productoFamProv ->isEmpty())

        @foreach($productoFamProv as $resultados)

          <div class="buscarproductoCardCss z-depth-2">
            <img class="buscarproductoCardImgCss"
              src="/Imagenes/Productos/{{ $resultados->nom_fami }}/{{ $resultados->nom }}/{{ $resultados->id_produc }}/1.jpg"
              alt="">
            <div class="buscarproductoCardInfoCss">
              <h5 class="titlulo">{{ $resultados->titulo }}</h5>
              <h6 class="titluloProve">{{ $resultados->nom }}</h6>
              <h6 class="precio">{{ $resultados->prec_uni }}</h6>
              <div class="footerCardCss">
                <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> </div>
            </div>
          </div>
        @endforeach

      @else

        @if(!$resultadoFAM -> isEmpty())
          @foreach($resultadoFAM as $resultados)

            <div class="buscarproductoCardCss z-depth-2">
              <img class="buscarproductoCardImgCss"
                src="/Imagenes/Productos/{{ $resultados->nom_fami }}/{{ $resultados->nom }}/{{ $resultados->id_produc }}/1.jpg"
                alt="">
              <div class="buscarproductoCardInfoCss">
                <h5 class="titlulo">{{ $resultados->titulo }}</h5>
                <h6 class="titluloProve">{{ $resultados->nom }}</h6>
                <h6 class="precio">{{ $resultados->prec_uni }}</h6>
                <div class="footerCardCss">
                  <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> </div>
              </div>
            </div>
          @endforeach
        
        @else
          @foreach($resultadoMAR as $resultados)
            <div class="buscarproductoCardCss z-depth-2">
              <img class="buscarproductoCardImgCss"
                src="/Imagenes/Productos/{{ $resultados->nom_fami }}/{{ $resultados->nom }}/{{ $resultados->id_produc }}/1.jpg"
                alt="">
              <div class="buscarproductoCardInfoCss">
                <h5 class="titlulo">{{ $resultados->titulo }}</h5>
                <h6 class="titluloProve">{{ $resultados->nom }}</h6>
                <h6 class="precio">{{ $resultados->prec_uni }}</h6>
                <div class="footerCardCss">
                  <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> </div>
              </div>
            </div>
          @endforeach
          
          @if($resultadoMAR -> isEmpty())
            @foreach($quefamilia as $fam)
              <ul class="collection">
                <li><a class="collection-item" href="{{ url("buscarproducto/{$fam->nom_fami}") }}">{{ $fam->nom_fami }}</a></li>
              </ul>        
            @endforeach
          @endif
        @endif
      @endif
    </div>
    <br>
    <br>
    <br>
    @if(!$productoFamProv ->isEmpty())
      {{ $resultadoFAM->render("pagination::materialize-ui") }}
    @else
      @if($resultadoFAM -> isEmpty())
        {{ $resultadoFAM->render("pagination::materialize-ui") }}

      @else
        {{ $resultadoMAR->render("pagination::materialize-ui") }}

      @endif
    @endif

  </div>
</div>
@endsection