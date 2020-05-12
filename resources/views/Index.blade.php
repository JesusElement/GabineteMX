<!-- IMPORTANTE PARA QUE EL LOADER CARGUE PRIMERO TIENE QUE ESTAR EL CODIGO AQUI     -->
@php
if(isset($_GET['page'])){
}
else{
@endphp
<style>
  
  .master{
    position: absolute;
    width: 100%;
    height: 100%;
    overflow-y: hidden!important;
    
    background-color: #404040;
    z-index: 9999;
  }
  .content::-webkit-scrollbar { 
  /* solo oculta su visualizacion */
  display: none;
}
  
  .loader {
    position: absolute;
    width: 500px;
    height: 200px;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
  }
      @keyframes load {
      0%{
          opacity: 0.08;
          filter: blur(5px);
          letter-spacing: 3px;
          }
      100%{
  
          }
  }
  
  .animate {
    display:flex;
    justify-content: center;
    align-items: center;
    height:100%;
    margin: auto;
    color: #ffffff;
    font-family: Helvetica, sans-serif, Arial;
    animation: load 1.2s infinite 0s ease-in-out;
    animation-direction: alternate;
    text-shadow: 0 0 1px white;
  }
 
  html,body{
  overflow-x: hidden;
 
  height:100%;
  width:101%;
  margin: 0px;
  padding: 0px;
}
      </style>
  
  
  <div class="master">
    <div class="loader">
    <!-- <h2 class="animate">GABINETE MX</h2> -->
    <img class="animate" src="/Imagenes/logo.png">
  
    </div>
  </div>
 @php 
}
 @endphp 
  
  
  <script>
 $(window).on("load", function () {
  setTimeout(function () {
    $(".master").css({ visibility: "hidden", opacity: "0" }).fadeOut("slow");
  }, 3990);
});
$(window).on("load", function () {
  setTimeout(function () {
    $(".loader").css({ visibility: "hidden", opacity: "0" }).fadeOut("slow");
  }, 4000);
});
  
  </script>

      <!-- TERMINA EL LOADER  -->

@extends('layouts.plantilla')

@section('seccion')
 
<div class="contenido">   

            <div class="carousel">

              <style>
                .carousel .carousel-item {
                width:82% !important;
                height:100% !important;
                }
                .carousel-item img{
                
                height: 100%;
                
                }
                </style>
                <a class="carousel-item imgCaroCss" href="#one!"><img src="/Imagenes/Banners/Banner_6.jpg"></a>
                <a class="carousel-item imgCaroCss" href="#one!"><img src="/Imagenes/Banners/Banner_2.jpg"></a>
                <a class="carousel-item imgCaroCss" href="#one!"><img src="/Imagenes/Banners/Banner_3.jpg"></a>
                <a class="carousel-item imgCaroCss" href="#one!"><img src="/Imagenes/Banners/Banner_4.jpg"></a>
                <a class="carousel-item imgCaroCss" href="#one!"><img src="/Imagenes/Banners/Banner_5.jpg"></a>
                <a class="carousel-item imgCaroCss" href="#one!"><img src="/Imagenes/Banners/Banner_1.jpg"></a>
               
              </div>
              

            <div class="otroscontenidos">
            <div class="marizq"></div>
                @php
                  $i = 1;
                  $p = 1;
                @endphp
                @foreach($ofertas as $oferta)
                <div class="card{{$i}}">
                      <div class="card z-depth-3">
                        <div class="card-image">
                          <img class="imgCard" src="Imagenes/Productos/{{$oferta->nom_fami}}/{{$oferta->nom}}/{{$oferta->id_produc}}/1.jpg">
                          
                          <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger" href="#modal{{$p}}"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                          
                        @php
                          $desc = $oferta->prec_uni * ($oferta->desc / 100 );
                          $precio = $oferta->prec_uni - $desc;
                          $precio = round($precio, 2);
                          
                        @endphp 
                        <div style="width: 300px; max-height: 800px;">
                        <span class="card-title" style="text-overflow: ellipsis;    white-space: nowrap;  overflow: hidden;">{{ $oferta->titulo }}</span>
                        </div>
                          <h6 class="black-text"><s>Antes: ${{ number_format($oferta->prec_uni) }} </s> </h6>
                          <h6 class="black-text">Ahora: ${{ number_format($precio) }}</h6>
                        </div>
                      </div>
                </div>

                <div id="modal{{$p}}" class="modal">
                  <div class="modal-content">
                    <h4>{{ $oferta->titulo }}</h4>
                    <h5 class="black-text">Total: ${{number_format($precio)}}</h5>
                  <h6 class="black-text">Caracteristicas</h6>
                  </div>
                  <div class="container">
                    <div>
                    @php 
                    $datos = str_replace("*/*", '</br>', $oferta->datos);
                     $datos = explode('*/*',$oferta->datos);
                     foreach ($datos as $key){
                      if($key == 'No'){
                        echo '<li> Graficos Integrados: '.$key.'</li>';
                      }
                      else if ($key == 'Si'){
                        echo '<li> Graficos Integrados: '.$key.'</li>';
                      }
                      else{
                        echo '<li>'.$key.'</li>';
                      }
                     }
                    @endphp
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="#!" class="modal-close btn waves-effect waves-light red">Cerrar</a>
                    <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a>
                    <a href="{{route('producto',['num_produc' => $oferta->id_produc])}}" class="btn waves-effect waves-light btnComprar">Especificaciones</a>
                  </div>
                </div> 

                @php
                $i++;
                $p++;
                if( $i == 5){
                  $i= 1;
                  echo '<div class="marizq"></div>';
                  echo '<div class="marizq"></div>';
                }
                @endphp
                @endforeach             
            </div>

                
            <br>
            <br>
            <br>
            
            <div class="container paginacion" >
              <center>
              
              {{ $ofertas->render("pagination::materialize-ui")}}
              </center>
            </div>
            <br>
            <br>
            <br>
</div>
@endsection