<style>
    /* .modal { max-height: 100%; overflow: visible;} */
    .customalta.open {
        width: 35%;
        max-height: 100%;
        height: 95%;
        top: 0 !important;
    }
</style>



<div class="modal customalta" id="#altapromocion">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">
            <div class="contenido">
                <div class="row">

                    <form class="col s12" action="{{ url("/admin/altapromocion") }}" method="post"
                        enctype="multipart/form-data" class="reviews-form" role="form">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="input-field col s12">


                                <h3>Alta de promociones</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <select id="id_produc" name="id_produc" onchange="ShowSelected()" required>
                                    <option value="" selected="true" disabled="disabled">SELECCIONE NOMBRE DE PRODUCTO
                                    </option>
                                    @foreach($producto ?? '' as $prod)
                                        <option value="{{ $prod->id_produc }}">{{ $prod->titulo }}</option>
                                    @endforeach
                                </select>
                                <label>PRODUCTOS</label>
                            </div>

                        </div>
                        <input type="text" id="id_p" name="id_p" hidden required>



                        <div class="row">
                            <div class="input-field col s6">
                                <input type="date" data-date="" data-date-format="YYYY MMMM DD" required id="fech_ini"
                                    name="fech_ini">
                                <label for="fech_ini">FECHA INICIO:</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="date" data-date="" data-date-format="YYYY MMMM DD" required id="fech_ter"
                                    name="fech_ter">
                                <label for="fech_ter">FECHA TERMINO:</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s6">
                                <input type="time" id="hora_ini" name="hora_ini" required>
                                <label for="hora_ini">HORA DE INICIO:</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="time" id="hora_ter" name="hora_ter" required>
                                <label for="hora_ter">HORA DE TERMINO:</label>

                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <input type="number" id="desc" name="desc" min="1" max="100" required>
                                <label for="desc">Descuento:</label>

                            </div>
                        </div>


                </div>

                <!--EndBody-->
            </div>
            <div class="modal-footer">

                {{-- Token para que laravel tome como valido este form --}}


                <button type="submit" class=" waves-effect waves-green btn deep-orange accent-4">AGREGAR</button>

                </form>
                <button class="modal-action modal-close waves-effect waves-red btn blue-grey lighten-2">Cerrar</button>
            </div>{{-- terminacion de class row --}}


        </div>
    </div>
</div>