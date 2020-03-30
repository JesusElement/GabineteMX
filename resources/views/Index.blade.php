@extends('plantilla')

@section('seccion')
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