<style>
  /* .modal { max-height: 100%; overflow: visible;} */
  .fullscreen.open {
    width: 100%;
    max-height: 100%;
    height: 100%;
    top: 0 !important;
  }
</style>

<div class="modal fullscreen" id="#actualizarproducto{{ $resultados->id_produc }}"> {{--  INICIA MODAL DE UPDATE --}}
  <div class="modal-content"> {{---INICIA CONTENT--}}
    <div class="modal-body"> {{-- INICIA BODY --}}


      <aside class="contenedor60"> {{--  INICIA EL 60 % DEL FORMULARIO --}}
        <div class="contenido">
          <form action="{{ url("actualizarproducto/{$resultados->id_produc}") }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{-- Token para que laravel tome como valido este form --}}
              <div class="agregarProductoCss">
                  <div class="marizq">
      
                  </div>
                  <div class="tituloCss">
                      <h3>Actualizar producto</h3>
      
                  </div>

         
                  <div class="proveCss">
                      <select id="id_provee" class="form-control" name="id_provee" disabled>
                          <option value="{{ $resultados->id_provee }}" selected="true" disabled="disabled">{{$resultados->nom}}</option>
                          @foreach($proveedor ?? '' as $id_provee)
                          <option value="{{ $id_provee->id_provee }}">{{ $id_provee->nom }}</option>
      
                          @endforeach
                      </select>
                   
                  </div>
      
      
                  <div class="famProCss">
      
                      <select id="id_familia" class="form-control" name="id_familia" disabled>
                          <option value="{{ $resultados->id_familia }}" selected="true" disabled="disabled">{{ $resultados->nom_fami }}</option>
                          @foreach($familia ?? '' as $id_familia)
                          <option value="{{ $id_familia->id_familia }}">{{ $id_familia->nom_fami }}</option>
      
                          @endforeach
                      </select>
                      
      
                  </div>
                  <div class="subFamCss">
      
      
                      <select id="clav_clas" class="form-control" name="clav_clas" disabled>
                          <option value="{{ $resultados->clav_clas }}" selected="true" disabled="disabled">{{ $resultados->name }}</option>
                          @foreach($clave ?? '' as $id_clav)
                          <option value="{{ $id_clav->id_clav }}">{{ $id_clav->name }}</option>
      
                          @endforeach
                      </select>
                     
      
                  </div>
                  <div class="nomProCss">
                      <input id="titulo" type="text" class="validate" name="titulo" required value="{{ $resultados->titulo }}">
                      <label for="titulo">{{ 'Nombre del producto' }}</label>
                  </div>
                  <div class="desProCss input-field ">
                      <div class="input-field  col s6">
      
                          <textarea id="icon_prefix2" name="datos" class="materialize-textarea validate" data-length="175"
                              requiered rows="10">{{ $resultados->datos }}</textarea>
                          <label for="icon_prefix2">{{ 'Descripcion' }}</label>
                      </div>
                  </div>
      
                  <div class="precioProCss">
                      <input id="prec_uni" type="text" class="validate" name="prec_uni" required value="{{ $resultados->prec_uni }}">
                      <label for="prec_uni">{{ 'Precio' }}</label>
                  </div>
                  <div class="imagenProCss">
                      <div class="file-field input-field">
                          <div class="btn">
                              <span>File</span>
                              <input type="file" id="imagen" name="imagen" multiple >
                          </div>
                          <div class="file-path-wrapper">
                              <input class="file-path validate" type="text"
                                  placeholder="Subir imagenes (Para seleccionar varias presiona CTRL+Click)">
                          </div>
                      </div>
                  </div>
                  <div class="stockProCss">
                      <p class="range-field">
                          <input id="stock" type="text" class="validate" name="stock" required value="{{ $resultados->stock}}">
                          <label for="range">{{ 'Stock' }}</label>
                      </p>
                  </div>

        




                  <div class="bttnCss">
                      <center>
                        <button type="submit" class="modal-close waves-effect waves-green btn green lighten-1">¡ACTUALIZAR!</button>
                        
                      </center>
                  </div>
                  <br>
                  <br>
          </form>

          <div class="bttnCss">
            <button class="modal-action modal-close waves-effect waves-red btn red lighten-1" id="cerrarmodal">Cerrar</button>
            </div>
          <div class="marder">
      
          </div>
       
      </div>
      </div>
      
      </aside> {{--TERMINA 60%--}}



      <article class="contenedor40"> {{-- INICIA 40% PARA MOSTRAR IMAGENES DEL PRODUCTO--}}
        <div> {{-- INICIA TITUTLO 40%--}}
          <h4>Imagenes</h4>
        </div> {{-- TERMINA TITUTLO 40% --}}
        <?php
       
        $d = opendir("./Imagenes/Productos/$resultados->nom_fami/$resultados->nom/$resultados->id_produc/");
        while (($e = readdir($d)) != false)
          if ($e != '.' && $e != '..') {
       
             $e1 = "/Imagenes/Productos/$resultados->nom_fami/$resultados->nom/$resultados->id_produc/" . $e;
            echo "<img   src='$e1'  style=' width: 30%; height: 30%;     position: sticky;' >  ";
           
          }
        ?>


      </article>{{-- TERMINA 40% PARA MOSTRAR IMAGENES DEL PRODUCTO--}}

    </div> {{--TERMINA BODY--}}
  </div> {{--TERMINA CONTENT--}}
</div>{{--TERMINA MODAL--}}