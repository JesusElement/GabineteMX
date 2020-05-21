<style>
    /* .modal { max-height: 100%; overflow: visible;} */
    .fullscreen.open {
        width: 100%;
        max-height: 100%;
        height: 100%;
        top: 0 !important;
        background-color: #f0f0f0;
    }
</style>

<div class="modal fullscreen" id="#procederpago">
    {{-- INICIA MODAL DE UPDATE --}}
    <div class="modal-content"> {{-- -INICIA CONTENT --}}
        <div class="modal-body"> {{-- INICIA BODY --}}
            <div class="contenedor61"> {{-- INICIA EL 60 % DEL FORMULARIO --}}
                <div class="titulo">
                    <h4>Pago</h4>
                </div>
                <div class="HederTres  z-depth-2">
                    <div class="Pan1">
                        <h5>Dirección</h5>
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Direcciones</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Dirección de envio</label>
                        </div>
                    </div>
                    <div class="Pan2">
                        <h5>Tarjeta</h5>
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Tarjetas</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Selecciona tarjeta</label>
                        </div>
                    </div>
                    <div class="Pan3">
                        <div class="col s12 m7 z-depth-0">
                            <h5 class="header">Envio gratis</h5>
                            <div class="card horizontal c z-depth-0">
                                <i class="material-icons i">a card_giftcard</i>
                                <div class="card-stacked c">
                                    <div class="card-content c">
                                        <p>Por inauguración temporalmente todos nuestros envios son gratis</p>
                                    </div>
                                    <div class="card-action">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <div class="contenedor21">
                @foreach ($Carrito as $q)
                <div class="carritoCardCss z-depth-2">
                    <div class="carritoCardImgCss">
                        <img class="carritoImgCss"
                            src="/Imagenes/Productos/{{ $q->nom_fami }}/{{ $q->nom }}/{{ $q->id_produc }}/1.jpg"
                            alt="">
                    </div>
                    <div class="carritoCardInfoCss">
                        <h5 class="titulo">{{ $q->titulo }}</h5>
                        <p>{{ $q->nom }}</p>
                        <p>Cantidad:</p>
                        <p style="display: none;">{{ $H = $q->stock }}</p>
                        <a class="waves-effect waves-light btn transparent"
                            href="{{ url("carritoMenos/{$q->id_produc}") }}"
                            id="quantity"><i class="b material-icons">remove</i></a>
                        <b style="margin: 1rem; background-color: #fff;">{{ $q->cantidad }}</b>
                        <a class="waves-effect waves-light btn transparent"
                            href="{{ url("carritoMas/{$q->id_produc}") }}" id="quantity"><i
                                class="b material-icons">add</i></a>
                    </div>
                    <div class="carritoEliPreCss">
                        <b class="precio">${{ number_format($q->cantidad*$q->prec_uni,2) }} x
                            {{ $q->cantidad }}</b>
                        <a class="Eli"
                            href="{{ url("EliCarrito/{$q->id_produc}") }}">Eliminar</a>

                    </div>

                </div>
          
              @endforeach
      
            </div>
            <div class="Pago">
                <div class="col s12 m7">
                    <h5 class="header">Pago</h5>
                    <div class="card horizontal c">
                        <i class="material-icons i">credit_card</i>
                        <div class="card-stacked c">
                            <div class="card-content c">
                                <h6>Total:
                                    @php
                                        echo number_format($Total,2);
                                    @endphp
                                     </h6>
                            </div>
                            <div class="card-action">
                             
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bttnCss">
                    <button class="modal-action modal-close waves-effect waves-red btn red lighten-1"
                        id="cerrarmodal">Cerrar</button>
                </div>
            </div>
            </div>
        </div> {{-- TERMINA BODY --}}
    </div> {{-- TERMINA CONTENT --}}
</div>{{-- TERMINA MODAL --}}