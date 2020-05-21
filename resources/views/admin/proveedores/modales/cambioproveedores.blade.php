<style>
    /* .modal { max-height: 100%; overflow: visible;} */
    .customalta.open {
      width: 35%;
      max-height: 100%;
      height: 95%;
      top: 0 !important;
    }
  </style>
  


<div class="modal customalta" id="#cambioproveedores{{ $resultados->id_provee}}">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">
            <div class="contenido">
                 <div class="row">

                    <form class="col s12" action="{{ url("/admin/cambioproveedores/{$resultados->id_provee}")}}" method="post" 
                    enctype="multipart/form-data" class="reviews-form" role="form">
                    {{ csrf_field() }}
            
               
                    <div class="row">
                        <div class="input-field col s12">


                            <h3>Cambio de proveedores</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="nom" name="nom" required style="text-transform:uppercase;" value="{{ $resultados->nom}}">
                            <label for="nom">Nombre (Corto):</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="nom_or" name="nom_or" required style="text-transform:uppercase;" value="{{ $resultados->nom_or}}">
                            <label for="nom_or">Nombre (Completo):</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="email" id="correo" name="correo" required value="{{ $resultados->correo}}">
                            <label for="correo">Correo:</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="telefono" name="telefono" required value="{{ $resultados->telefono}}">
                            <label for="telefono">Telefono:</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="razon_s" name="razon_s" required style="text-transform:uppercase;" value="{{ $resultados->razon_s}}">
                            <label for="razon_s">Razon Social:</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="direccion" name="direccion" required value="{{ $resultados->direccion}}">
                            <label for="direccion">Direccion:</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="cp" name="cp" required value="{{ $resultados->cp}}">
                            <label for="cp">Codigo Postal:</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="rfc" name="rfc"  placeholder="XAXX010101000" style="text-transform:uppercase;" value="{{ $resultados->rfc}}"
                                required>
                            <label for="rfc">RFC:</label>

                        </div>
                    </div>



                  
                </div>

            </div>

            <!--EndBody-->
        </div>
        <div class="modal-footer">
         
            {{-- Token para que laravel tome como valido este form --}}


            <button type="submit" class="waves-effect waves-green btn deep-orange accent-4">ACTUALIZAR</button>

        </form>
        <button class="modal-action modal-close waves-effect waves-red btn blue-grey lighten-2">Cerrar</button>
        </div>{{-- terminacion de class row --}}

          
        </div>
    </div>
</div>