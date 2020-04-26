@extends('layouts.plantilla')

@section('seccion')
 <!-- IMPORTANTE PARA QUE EL LOADER CARGUE PRIMERO TIENE QUE ESTAR EL CODIGO AQUI     -->
 <style>
    
    .master{
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #404040;
      z-index: 9999;
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
    /* body, html{
      height: 96vh;
      background-color: #111;
      color: white;
    } */
        </style>
    
    
    <div class="master">
      <div class="loader">
      <!-- <h2 class="animate">GABINETE MX</h2> -->
      <img class="animate" src="/Imagenes/logo.png">
    
      </div>
    </div>
    
    
    
    <script>
           $(window).on('load', function () {
          setTimeout(function () {
        $(".master").css({visibility:"hidden",opacity:"0"} ).fadeOut("slow")} , 3990);
       });
     $(window).on('load', function () {
          setTimeout(function () {
        $(".loader").css({visibility:"hidden",opacity:"0"} ).fadeOut("slow")} , 4000);
       });
    
       
    
    
        </script>

        <!-- TERMINA EL LOADER  -->
<div class="contenido">   

            <div class="carousel">
                <a class="carousel-item" href="#one!"><img src="/Imagenes/BannerBlancoRam.png"></a>
               
              </div>

            <div class="otroscontenidos">
                <div class="marizq"></div>
                <div class="card1">

                      <div class="card z-depth-3">
                        <div class="card-image">
                          <img class="imgCard" src="Imagenes/GabineteGamer.png">
                          <span class="card-title">Corsair iCUE 220T RGB</span>
                          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                          <h6 class="black-text">Total: $3,776.53</h6>
                          <p>
                              <ul>
                                  <li> Cristal Templado</li>
                                  <li>USB 3.0</li>
                                  <li>Ventiladores RGB</li>
                              </ul>
                          </p>
                        </div>
                      </div>
                </div>
                <div class="card2">

                      <div class="card z-depth-3">
                        <div class="card-image">
                          <img class="imgCard" src="Imagenes/tarhetagrafica.png">
                          <span class="card-title">NVIDIA GeForce GTX</span>
                          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                          <h6 class="black-text">Total: $7,176.11</h6>
                          <p>
                              <ul>
                                  <li>7,176.11o</li>
                                  <li>DDR6</li>
                                  <li>450W</li>
                              </ul>
                          </p>
                        </div>
                      </div>
                </div>
                <div class="card3">

                      <div class="card z-depth-3">
                        <div class="card-image">
                          <img class="imgCard" src="Imagenes/tarm.png">
                          <span class="card-title">Tarjeta Madre Asus ROG</span>
                          <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger"  href="#modal1"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                          <h6 class="black-text">Total: $9,776.53</h6>
                          <p>
                              <ul>
                                  <li>XI</li>
                                  <li>Intel</li>
                                  <li>ATX</li>
                              </ul>
                          </p>
                        </div>
                      </div>
                </div>
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4>Asus ROG</h4>
                    <h6 class="black-text">Total: $9,776.53</h6>
                    <table>
                      <thead>
                        <tr>
                            <th>Caracteristicas</th>
                            <th style="width: 80%;">Detalles</th>
                        </tr>
                      </thead>         
                      <tbody>
                        <tr>
                          <td>Chipset</td>
                          <td>Intel® Z390</td>
                        </tr>
                        <tr>
                          <td>Memoria</td>
                          <td>4 x DIMM, Max. 128GB, DDR4</td>
                        </tr>
                      </tbody>
                    </table>
                          
                  </div>
                  <div class="modal-footer">
                    <a href="#!" class="modal-close btn waves-effect waves-light red">Cerrar</a>
                    <a href="#!" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a>
                    <a href="{{route('producto',[1])}}" class="btn waves-effect waves-light btnComprar">Especificaciones</a>
                  </div>
                </div>
                <div class="card4">

                      <div class="card z-depth-3">
                        <div class="card-image">
                          <img class="imgCard" src="Imagenes/MouseGamer.png">
                          <span class="card-title">Corsair iCUE 220T RGB</span>
                          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                          <p>
                            <h6 class="black-text">Total: $1,330.38</h6>
                              <ul>
                                  <li>Alámbrico</li>
                                  <li>Gaming</li>
                                  <li>RGB</li>
                              </ul>
                          </p>
                        </div>
                      </div>
                </div> 
                <div class="marder"></div>                    
            </div>
        </div>
    @endsection