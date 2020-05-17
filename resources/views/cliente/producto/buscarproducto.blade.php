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
      <form action="{{ url("/producto") }}" method="GET" role="form" id="VerProducto">
        {{ csrf_field() }}
      @if(!$productoFamProv ->isEmpty())
        @foreach($productoFamProv as $resultados)
          <div class="buscarproductoCardCss z-depth-2">
            <a href="{{ url("/producto?num_produc={$resultados->id_produc}") }}">
            <img class="buscarproductoCardImgCss"
              src="/Imagenes/Productos/{{ $resultados->nom_fami }}/{{ $resultados->nom }}/{{ $resultados->id_produc }}/1.jpg"
              alt="">
            </a>
            <div class="buscarproductoCardInfoCss">
            <button class="btnCss" form="VerProducto" name="num_produc" value="{{$resultados->id_produc}}">
              <h5 class="titlulo">{{ $resultados->titulo }}</h5>
                            {{-- Zona de estrellas --}}
              <div class="EstrellasBuscarPCss">
                            @php
                           $id_Producto = $resultados->id_produc; 
                    $Res = DB::select("SELECT COUNT(com.id_produc) as totalComent, sum(com.star) as totalStar FROM comentario as com INNER JOIN producto as p on com.id_produc = p.id_produc WHERE p.id_produc ='$id_Producto';");
                          
                    if ($Res == false) {
                            echo"Algo salio mal";
                          } else {
                           // print_r($Res);
                            foreach ($Res as $star) {
                                $Estrellas = $star -> totalStar;
                               $Comentarios= $star -> totalComent;
                            }
                            $Estrellas;
                            $Comentarios;
                            if ($Estrellas == 0 || $Comentarios == 0) {
                            
                            }else{
                            $NumStar = $Estrellas / $Comentarios;
                              
                            //echo $NumStar;
               
                            }
                          }
                          
                          @endphp
                  @if(isset($NumStar))
                          @if ($NumStar < 1)
                             <h6>¡Se el primero en calificarlo!</h6>
                              @php
                                   $NumStar = 0;
                              @endphp
                           @endif
                          @if ($NumStar >= 1 && $NumStar < 2 )
                          <i class="tiny material-icons star">star</i>
                          @php
                          $NumStar = 0;
                     @endphp
                          @endif
                          @if ($NumStar >= 2 && $NumStar < 3)
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          @php
                          $NumStar = 0;
                     @endphp
                          @endif
                          @if ($NumStar >= 3 && $NumStar < 4)
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          @php
                          $NumStar = 0;
                     @endphp
                          @endif
                          @if ($NumStar >= 4 && $NumStar < 5)
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          @php
                          $NumStar = 0;
                     @endphp
                          @endif
                          @if ($NumStar == 5)
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          <i class="tiny material-icons star">star</i>
                          @php
                          $NumStar = 0;
                     @endphp
                          @endif
                          @else
                          <h6>¡Se el primero en calificarlo!</h6>
                          @endif
            
                        </div>
                         {{-- Zona de estrellas --}}

                         <h6 class="titluloProve">Marca: {{ $resultados->nom }}</h6>
              <h6 class="precio">${{ $resultados->prec_uni }}</h6>
            </button> 
              <div class="footerCardCss">
                <a href="{{ url("carrito/{$resultados->id_produc}") }}" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> </div>
            </div>
          </div>
        @endforeach
      
      @else

        @if(!$resultadoFAM -> isEmpty())
          @foreach($resultadoFAM as $resultados)

            <div class="buscarproductoCardCss z-depth-2">
            <a href="{{ url("/producto?num_produc={$resultados->id_produc}") }}">
              <img class="buscarproductoCardImgCss"
                src="/Imagenes/Productos/{{ $resultados->nom_fami }}/{{ $resultados->nom }}/{{ $resultados->id_produc }}/1.jpg"
                alt="">
            </a>
              <div class="buscarproductoCardInfoCss">
            <button class="btnCss" form="VerProducto" name="num_produc" value="{{$resultados->id_produc}}">
                <h5 class="titlulo">{{ $resultados->titulo }}</h5>
                      {{-- Zona de estrellas --}}
              <div class="EstrellasBuscarPCss">
                @php
               $id_Producto = $resultados->id_produc; 
        $Res = DB::select("SELECT COUNT(com.id_produc) as totalComent, sum(com.star) as totalStar FROM comentario as com INNER JOIN producto as p on com.id_produc = p.id_produc WHERE p.id_produc ='$id_Producto';");
              
        if ($Res == false) {
                echo"Algo salio mal";
              } else {
               // print_r($Res);
                foreach ($Res as $star) {
                    $Estrellas = $star -> totalStar;
                   $Comentarios= $star -> totalComent;
                }
                $Estrellas;
                $Comentarios;
                if ($Estrellas == 0 || $Comentarios == 0) {
                
                }else{
                $NumStar = $Estrellas / $Comentarios;
                  
                //echo $NumStar;
   
                }
              }
              
              @endphp
            @if(isset($NumStar))
              @if ($NumStar < 1)
                 <h6>¡Se el primero en calificarlo!</h6>
                  @php
                       $NumStar = 0;
                  @endphp
               @endif
              @if ($NumStar >= 1 && $NumStar < 2 )
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar >= 2 && $NumStar < 3)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar >= 3 && $NumStar < 4)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar >= 4 && $NumStar < 5)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar == 5)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @else
              <h6>¡Se el primero en calificarlo!</h6>
              @endif

            </div>
             {{-- Zona de estrellas --}}
                <h6 class="titluloProve">Marca: {{ $resultados->nom }}</h6>
                <h6 class="precio">${{ $resultados->prec_uni }}</h6>
                </button>
                <div class="footerCardCss">
                  <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> </div>
              </div>
            </div>
          @endforeach
        
        @else
          @foreach($resultadoMAR as $resultados)
            <div class="buscarproductoCardCss z-depth-2">
            <a href="{{ url("/producto?num_produc={$resultados->id_produc}") }}">
              <img class="buscarproductoCardImgCss"
                src="/Imagenes/Productos/{{ $resultados->nom_fami }}/{{ $resultados->nom }}/{{ $resultados->id_produc }}/1.jpg"
                alt="">
            </a>
              <div class="buscarproductoCardInfoCss">
            <button class="btnCss" form="VerProducto" name="num_produc" value="{{$resultados->id_produc}}">
                <h5 class="titlulo">{{ $resultados->titulo }}</h5>
                      {{-- Zona de estrellas --}}
              <div class="EstrellasBuscarPCss">
                @php
               $id_Producto = $resultados->id_produc; 
        $Res = DB::select("SELECT COUNT(com.id_produc) as totalComent, sum(com.star) as totalStar FROM comentario as com INNER JOIN producto as p on com.id_produc = p.id_produc WHERE p.id_produc ='$id_Producto';");
              
        if ($Res == false) {
                echo"Algo salio mal";
              } else {
               // print_r($Res);
                foreach ($Res as $star) {
                    $Estrellas = $star -> totalStar;
                   $Comentarios= $star -> totalComent;
                }
                $Estrellas;
                $Comentarios;
                if ($Estrellas == 0 || $Comentarios == 0) {
                
                }else{
                $NumStar = $Estrellas / $Comentarios;
                //echo $NumStar;
                }
              }
              
              @endphp
            @if(isset($NumStar))
              @if ($NumStar < 1)
                 <h6>¡Se el primero en calificarlo!</h6>
                  @php
                       $NumStar = 0;
                  @endphp
               @endif
              @if ($NumStar >= 1 && $NumStar < 2 )
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar >= 2 && $NumStar < 3)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar >= 3 && $NumStar < 4)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar >= 4 && $NumStar < 5)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @if ($NumStar == 5)
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              <i class="tiny material-icons star">star</i>
              @php
              $NumStar = 0;
         @endphp
              @endif
              @else
              <h6>¡Se el primero en calificarlo!</h6>
              @endif

            </div>
             {{-- Zona de estrellas --}}
                <h6 class="titluloProve">Marca: {{ $resultados->nom }}</h6>
                <h6 class="precio">${{ $resultados->prec_uni }}</h6>
                <</button>
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
    </form>
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