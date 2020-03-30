 @extends('plantilla')
 
 @section('seccion')
 <div class="contenido">
            <div class="Carrito">
                <div  class="marizq">

                </div>
                <div class="col s12 m12 imagenCarrito">
                    <h2 style="background-color: #ffffff;" class="header">Carrito de compras</h2>
                    <div class="card horizontal">
                      <div class="card-image">
                        <img class="ImgTarjeta" src="/Imagenes/venderTar.png">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                            <span class="card-title">AMD B450, Motherboard ASUS ROG Strix B450-F Gaming</span>
                            <h6 class="black-text">precio: $9,776.53</h6>
                        </div>
                        <div class="card-action">
                          <a href="#">This is a link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="opCarrito">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card white darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                Carrito de compras
                                    </span>
                             
                                </div>
                                <div class="card-action">
                                    
                                      <h6 class="black-text">
                                        N. Productos: 1  
                                        <br>
                                        <br>
                                        Total: $9,776.53
                                      </h6>
                                      <br>
              <a href="Venta.html" class="btn waves-effect waves-light btnAgregarCarrito">Proceder al pago</a>
                                    
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