<style>
    /* .modal { max-height: 100%; overflow: visible;} */
    .customaltapr.open {
        width: 35%;
        max-height: 100%;
        height: 95%;
        top: 0 !important;
    }
</style>



<div class="modal customaltapr" id="#altaproveedores">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">
            <div class="contenido">
                <div class="row">

                    <form class="col s12" action="{{ url("/admin/altaproveedores") }}"
                        method="post" enctype="multipart/form-data" class="reviews-form" role="form">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="input-field col s12">


                                <h3>Alta de proveedores</h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="nom" name="nom" required style="text-transform:uppercase;" >
                                <label for="nom">Nombre (Corto):</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="nom_or" name="nom_or" required style="text-transform:uppercase;" >
                                <label for="nom_or">Nombre (Completo):</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" id="correo" name="correo" required>
                                <label for="correo">Correo:</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="number" id="telefono" name="telefono" required>
                                <label for="telefono">Telefono:</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="razon_s" name="razon_s" required style="text-transform:uppercase;" >
                                <label for="razon_s">Razon Social:</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="direccion" name="direccion" required>
                                <label for="direccion">Direccion:</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="cp" name="cp" required>
                                <label for="cp">Codigo Postal:</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="rfc" name="rfc" value="XAXX010101000" placeholder="XAXX010101000" style="text-transform:uppercase;" 
                                    required>
                                <label for="rfc">RFC:</label>

                            </div>
                        </div>




                </div>




            </div>

            <!--EndBody-->
        </div>
        <div class="modal-footer">



            <button type="submit" class=" waves-effect waves-green btn deep-orange accent-4" onclick="x()">AGREGAR</button>

            </form>
            <button class="modal-action modal-close waves-effect waves-red btn blue-grey lighten-2">Cerrar</button>
        </div>{{-- terminacion de class row --}}
   

    </div>
</div>
</div>