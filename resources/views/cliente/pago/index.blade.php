<style>
    /* .modal { max-height: 100%; overflow: visible;} */
    .fullscreen.open {
        width: 100%;
        max-height: 100%;
        height: 100%;
        top: 0 !important;
        background-color: white;
    }
</style>
<form action="{{route('procederpago',['total'=>$Total])}}" method="POST" >
@csrf

@foreach ($Carrito as $q)
<?php
$idcant = $q->id_produc;
$idcant = "c-".$idcant;
?>
<input type="hidden" name="{{$q->id_produc}}" value="{{$q->id_produc}}">
<input type="hidden" name="{{$idcant}}" value="{{$q->cantidad}}">
@endforeach
<div class="modal fullscreen" id="#procederpago">
    {{-- INICIA MODAL DE UPDATE --}}
    <div class="modal-content"> {{-- -INICIA CONTENT --}}
        <div class="modal-body"> {{-- INICIA BODY --}}
            <div class="contenedor61"> {{-- INICIA EL 60 % DEL FORMULARIO --}}
                <div class="titulo">
                    <h4>Completa tu compra</h4>
                </div>
                <div class="HederTres  z-depth-2">
                    <div class="Pan1">
                        <h5>Tarjetas</h5>
                        <div class="input-field col s12">
                            <select id="tarjeta" class="form-control" name="tarjeta">
                                <option value="" selected="true" disabled="disabled">Selecciona una</option>
                                <?php

                                $user = auth()->user()->id_cliente;
                                $direc = DB::select('SELECT * FROM `cli_m_pago` WHERE id_cliente = ?', [$user]);
                             foreach($direc as $value){
                                    $card= $value->num_tar;
                                    $nom = $value->nom_card; 
                                    $expi = $value->expi;
                                    $id=$value->id_pago;
                                    $id = ($id*263412432)/2;
                                 $key="Una oracion al santro padre 3425ytsdfhvbdfs ";
                                 list($encrypted_data, $iv) = explode('::', base64_decode($card), 2);
                                 $valor = openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
                                $real = substr($valor,14,16);
         
                                ?>


                                <option value="<?php echo $id ?>"><?php echo "**** ".$real ?></option>

                                <?php
                            }
                            ?>
                            </select>
                             
                            <label>Tarjetas registradas</label>
                        </div>
                        @error('tarjeta')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="Pan2">
                        <h5>Direccion</h5>
                        <div class="input-field col s12">
                            <select id="direccion" class="form-control" name="direccion">
                                <option value="" selected="true" disabled="disabled">Direcciones</option>
                                @foreach($dir ?? '' as $direccion)
                                    <option value="{{ $direccion->alias }}">
                                        {{ $direccion->alias }}: {{ $direccion->calle }} {{ $direccion->numero }} {{ $direccion->ciudad }}
                                    </option>

                                @endforeach
                            </select>
                            <label>Selecciona un destino</label>
                        </div>
                        @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $message }}</strong>
                                </span>
                         @enderror
                    </div>
                    <div class="Pan3">
                        <div class="col s12 m7 z-depth-0">
                            <h5 class="header">Envio gratis</h5>
                            <div class="card horizontal c z-depth-0">
                                <i class="material-icons i">a card_giftcard</i>
                                <div class="card-stacked c">
                                    <div class="card-content c">
                                        <p>Por que eres lo mas importante, todos tus envios corren por nuestra cuenta.
                                        </p>
                                    </div>
                                    <div class="card-action">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="contenedor21">
                    @foreach($Carrito as $q)
                        <div class="carritoCardCss z-depth-2">
                            <div class="carritoCardImgCss">
                                <img class="carritoImgCss"
                                    src="/Imagenes/Productos/{{ $q->nom_fami }}/{{ $q->nom }}/{{ $q->id_produc }}/1.jpg"
                                    alt="">
                            </div>
                            <div class="carritoCardInfoCss">
                                <h5 class="titulo">{{ $q->titulo }}</h5>
                                <p style="display: none;">{{ $H = $q->stock }}</p>

                            </div>
                            <div class="carritoEliPreCss">
                                <b class="precio">${{ number_format($q->cantidad*$q->prec_uni,2) }} x
                                    {{ $q->cantidad }}</b>


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
                                    <br>
                                    <h6>Total: $
                                        @php
                                            echo number_format($Total,2);
                                        @endphp
                                    </h6>
                                    <br>
                                    <p style="font-size: 13px;">Todos nuestros precios incluyen IVA</p>
                                    <br>
                                </div>
                                <div class="card-action">
                                    <div class="bttnCss bconf ">
                                    <button type="submit" class="waves-effect waves-light btn  bconf light-green lighten-2">
                                        <span style="color: black">Confirmar pago</span></button>
                                    </div>

                                    <div class="bttnCss bagre">
                                        <a class="waves-effect waves-light btn light-green lighten-4" href="{{route('RegistroT',['create'=>'creacionTP'])}}">
                                            <span style="color: black">Agregar tarjeta</span></a>
                                        </div>

                                        <div class="bttnCss bcer">
                                            <button class="modal-action modal-close waves-effect waves-red btn red lighten-1"
                                                id="cerrarmodal">Cerrar</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
       
                </div>
            </div>
        </div> {{-- TERMINA BODY --}}
    </div> {{-- TERMINA CONTENT --}}
</div>{{-- TERMINA MODAL --}}
</form>