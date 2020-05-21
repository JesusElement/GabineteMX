@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
  <div class="buscarproductoCss">
    <div class="barraproductoCss">
      @guest
        @php
            $id = "";
        @endphp
          @else
          @php
              $id  =  auth()->user()->id_cliente;

          @endphp 
      @endguest
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
      <h5 class="opbuscarp">Opciones</h5>
      <hr class="opbuscarp">
      <h6 class="opbuscarp">Marcas y otros productos:</h6>

      <div class="opbuscarp collection z-depth-3">
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

      <div class="BuscarPCssPhone">
<center>
        <ul class="collapsible">
          <li>
            <div class="collapsible-header"></i>Mas opciones...</div>
        @if(!$Marca -> isEmpty() && ! $Categoria -> isEmpty())
          @foreach($Marca as $Mar)
            @foreach($Categoria as $item)
            <div class="collapsible-body"><span>
              <a href="{{ url("buscarproducto/{$item->nom_fami}-{$Mar->nom}") }}"
                class="waves-effect btn-small orange darken-1 rc">{{ $Mar->nom }}</a>
              </span></div>
            @endforeach
          @endforeach
   
        @else
          @if(!$Marca -> isEmpty())
            @foreach($quefamilia as $fam)
              @foreach($Marca as $Mar)
              <div class="collapsible-body"><span>
                <a href="{{ url("buscarproducto/{$fam->nom_fami}-{$Mar->nom}") }}"
                  class="waves-effect btn-small orange darken-1 rc">{{ $Mar->nom }}</a>
                </span></div>
              @endforeach
            @endforeach
     
          @else
            @foreach($Categoria as $item)
            <div class="collapsible-body"><span>
              <a href="{{ url("buscarproducto/{$item->nom_fami}") }}"
                class="waves-effect btn-small orange darken-1 rc">{{ $item->nom_fami }}</a>
              </span></div>
            @endforeach
          @endif
        @endif
      </li>
    </center>
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
                           //echo $id;
                    $Res = DB::select("SELECT COUNT(com.id_produc) as totalComent, sum(com.star) as totalStar FROM comentario as com INNER JOIN producto as p on com.id_produc = p.id_produc WHERE p.id_produc ='$id_Producto';");
                    $ResCarrito = DB::select("SELECT id_produc FROM carrito WHERE id_produc = '$id_Producto' AND id_cliente = '$id'");
                    $ResCarritoCount = DB::select("SELECT cantidad FROM carrito WHERE id_produc = '$id_Producto' AND id_cliente = '$id'");
                    
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
              <h6 class="precio">${{ number_format($resultados->prec_uni) }}</h6>
            </button> 
              <div class="footerCardCss">
                @php
                    if($ResCarrito == false){
                       // echo"Algo no esta bien :c";
                        $Agregado = "";
                    }else{
                      
                      foreach ($ResCarrito as $A) {
                                $Agregado = $A -> id_produc;
                            }
                          
                    }
                @endphp 
                @if ($Agregado == $resultados->id_produc)
                @foreach($ResCarritoCount as $NumP)
                <a href="{{ url("carrito/{$resultados->id_produc}") }}" id="jsAgrego" class="btn waves-effect waves-light orange darken-1 btnAgregarCarrito" >En carrito: {{$NumP->cantidad}}</a>
               @endforeach
              </div>
                @else
                <a href="{{ url("carrito/{$resultados->id_produc}") }}" id="jsAgrego" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> 
              </div>
                @endif
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
              // $id  =  auth()->user()->id_cliente; 

        $Res = DB::select("SELECT COUNT(com.id_produc) as totalComent, sum(com.star) as totalStar FROM comentario as com INNER JOIN producto as p on com.id_produc = p.id_produc WHERE p.id_produc ='$id_Producto';");
        $ResCarrito = DB::select("SELECT id_produc FROM carrito WHERE id_produc = '$id_Producto' AND id_cliente = '$id'");
        $ResCarritoCount = DB::select("SELECT cantidad  FROM carrito WHERE id_produc = '$id_Producto' AND id_cliente = '$id'");
              
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
             @php
             $idp=$resultados->id_produc;
   
             try {
             $flag=DB::table('oferta')
             ->join('stock','oferta.id_produc','=','stock.id_produc')
             ->select('oferta.id_produc','oferta.desc','stock.prec_uni',
             DB::raw('(case when oferta.desc is null then 0 else 1 end) as promocionflag'))
             ->where('oferta.id_produc','=',$idp)->first();
   
             if($flag->promocionflag == 1){
             $desc = $flag->prec_uni * ($flag->desc / 100 );
             $precio = $flag->prec_uni - $desc;
             $precio = round($precio, 2);
             }
             else {
             $precio = $resultados->prec_uni;
             }
   
   
   
             } catch (\Throwable $th) {
             $idp=$resultados->id_produc;
             $precio = $resultados->prec_uni;
             }
   
   
           @endphp
             
                <h6 class="titluloProve">Marca: {{ $resultados->nom }}</h6>
                <h6 class="precio">Precio:${{number_format($precio,2)}} </h6>
                </button>
                <div class="footerCardCss">
                  @php
                  if($ResCarrito == false){
                     // echo"Algo no esta bien :c";
                      $Agregado = "";
                  }else{
                    
                    foreach ($ResCarrito as $A) {
                              $Agregado = $A -> id_produc;
                          }
                        
                  }
              @endphp 
              @if ($Agregado == $resultados->id_produc)
              @foreach($ResCarritoCount as $NumP)
              <a href="{{ url("carrito/{$resultados->id_produc}") }}" id="jsAgrego" class="btn waves-effect orange darken-1 waves-light btnAgregarCarrito" >En carrito: {{$NumP->cantidad}}</a>
             @endforeach
            </div>
              @else
              <a href="{{ url("carrito/{$resultados->id_produc}") }}" id="jsAgrego" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> 
            </div>
              @endif
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
              // $id  =  auth()->user()->id_cliente;
        $Res = DB::select("SELECT COUNT(com.id_produc) as totalComent, sum(com.star) as totalStar FROM comentario as com INNER JOIN producto as p on com.id_produc = p.id_produc WHERE p.id_produc ='$id_Producto';");
        $ResCarrito = DB::select("SELECT id_produc FROM carrito WHERE id_produc = '$id_Producto' AND id_cliente = '$id'");
        $ResCarritoCount = DB::select("SELECT cantidad FROM carrito WHERE id_produc = '$id_Producto' AND id_cliente = '$id'");
              
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

                @php
                $idp=$resultados->id_produc;
      
                try {
                $flag=DB::table('oferta')
                ->join('stock','oferta.id_produc','=','stock.id_produc')
                ->select('oferta.id_produc','oferta.desc','stock.prec_uni',
                DB::raw('(case when oferta.desc is null then 0 else 1 end) as promocionflag'))
                ->where('oferta.id_produc','=',$idp)->first();
      
                if($flag->promocionflag == 1){
                $desc = $flag->prec_uni * ($flag->desc / 100 );
                $precio = $flag->prec_uni - $desc;
                $precio = round($precio, 2);
                }
                else {
                $precio = $resultados->prec_uni;
                }
      
      
      
                } catch (\Throwable $th) {
                $idp=$resultados->id_produc;
                $precio = $resultados->prec_uni;
                }
      
      
              @endphp


                <h6 class="precio">$Precio:${{number_format($precio,2)}} </h6>
                </button>
                <div class="footerCardCss">
                  @php
                  if($ResCarrito == false){
                     // echo"Algo no esta bien :c";
                      $Agregado = "";
                  }else{
                    
                    foreach ($ResCarrito as $A) {
                              $Agregado = $A -> id_produc;
                          }
                          echo $CarNumP;
                  }
              @endphp 
              @if ($Agregado == $resultados->id_produc)
               @foreach($ResCarritoCount as $NumP)
                <a href="{{ url("carrito/{$resultados->id_produc}") }}" id="jsAgrego" class="btn waves-effect orange darken-1 waves-light btnAgregarCarrito" >En carrito: {{$NumP->cantidad}}</a>
               @endforeach
              </div>
              @else
              <a href="{{ url("carrito/{$resultados->id_produc}") }}" id="jsAgrego" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a> 
            </div>
              @endif
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