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
      <article class="contenedor60"> {{--  INICIA EL 60 % DEL FORMULARIO --}}
        <form action="{{ url ('/updateproducto') }}" method="get" enctype="multipart/form-data">
          {{-- INICIA FORMULARIO --}}
          {{ csrf_field() }} {{-- Token para que laravel tome como valido este form --}}

          {{-- INICIA TITUTLO --}}
          <div>
            <h4>Actualizar producto</h4>
          </div>
          {{-- TERMINA TITULO --}}

          {{-- INICIO DEL SELECT DE PROVEDOR --}}
          <div class="proveCss">
            <select id="id_provee" class="form-control" name="id_provee">
              <option value="" selected="true" disabled="disabled">{{$resultados->nom}}</option>
              @foreach($proveedor ?? '' as $id_provee)
              <option value="{{ $id_provee->id_provee }}">{{ $id_provee->nom }}</option>

              @endforeach
            </select>
            <label>Provedores</label>
          </div>

          {{-- TERMINO DEL SELECT DE PROVEDOR --}}

          {{-- INICIO DE SELECT DE FAMILIA --}}
          <div class="famProCss">

            <select id="id_familia" class="form-control" name="id_familia">
              <option value="" selected="true" disabled="disabled">{{ $resultados->nom_fami }}</option>
              @foreach($familia ?? '' as $id_familia)
              <option value="{{ $id_familia->id_familia }}">{{ $id_familia->nom_fami }}</option>

              @endforeach
            </select>
            <label>Familia prodcuto</label>

          </div>

          {{-- TERMINO DE SELECT DE FAMILIA --}}

          {{-- INICIO DE SELECT DE SUBFAMILIA --}}
          <div class="subFamCss">
            <select id="clav_clas" class="form-control" name="clav_clas">
              <option value="" selected="true" disabled="disabled">{{ $resultados->name }}</option>
              @foreach($clave ?? '' as $id_clav)
              <option value="{{ $id_clav->id_clav }}">{{ $id_clav->name }}</option>

              @endforeach
            </select>
            <label>Subfamilia producto</label>
          </div>
          {{-- TERMINO DE SELECT DE SUBFAMILIA --}}

          {{-- INICIA INPUT DE NOMBRE DE PRODUCTO --}}

          <div class="nomProCss">
            <input id="titulo" type="text" class="validate" name="titulo" required value="{{ $resultados->titulo }}">
            <label for="titulo">{{ 'Nombre del producto' }}</label>
          </div>

          {{-- TERMINA INPUT DE NOMBRE DE PRODUCTO --}}

          {{-- INICIA TEXTAREA DE LA DESCRIPCION --}}

          <div class="desProCss input-field ">
            <div class="input-field  col s6">
              <textarea id="icon_prefix2" name="datos" class="materialize-textarea validate" data-length="175" requiered
                rows="10">{{ $resultados->datos }}</textarea>
              <label for="icon_prefix2">{{ 'Descripcion' }}</label>
            </div>
          </div>

          {{-- TERMINA TEXTAREA DE LA DESCRIPCION --}}
          {{-- INICIA INPUT DE PRECIO --}}

          <div class="precioProCss">
            <input id="precio" type="text" class="validate" name="precio" required
              placeholder="PRECIO EN PESOS MEXICANOS SOLO NUMEROS CON PUNTO">
            <label for="precio">{{ 'Precio' }}</label>
          </div>
          {{-- TERMINA INPUT DE PRECIO --}}


          {{-- INICIA INPUT FILE PARA LAS IMAGENES --}}
          <div class="imagenProCss">
            <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" id="imagen" name="imagen" multiple required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text"
                  placeholder="Subir imagenes (Para seleccionar varias presiona CTRL+Click)">
              </div>
            </div>
          </div>

          {{-- TERMINA INPUT FILE PARA LAS IMAGENES --}}

          {{-- INICIA INPUT DE STOCK --}}
          <div class="stockProCss">
            <p class="range-field">
              <input id="stock" type="text" class="validate" name="stock" required
                placeholder="UNICAMENTE VALOR EN ENTEROS">
              <label for="range">{{ 'Stock' }}</label>
            </p>
          </div>
          {{-- TERMINA INPUT DE STOCK --}}


        </form>{{-- TERMINA FORMULARIO --}}

      </article> {{--TERMINA 60%--}}

      <article class="contenedor40"> {{-- INICIA 40% PARA MOSTRAR IMAGENES DEL PRODUCTO--}}
        <div> {{-- INICIA TITUTLO 40%--}}
          <h4>Imagenes</h4>

          <?php
      

          $d = opendir("./Imagenes/Productos/Gabinetes/Acteck/AC9005GAB005/");

          // $d = opendir("./Imagenes/Productos/$id_familia->nom_fami/{{ $id_provee->nom }}/{{ $resultados->id_produc }}");
          while (($e = readdir($d)) != false)
            if ($e != '.' && $e != '..') {
         
              $e1 = "/Imagenes/Productos/Gabinetes/Acteck/AC9005GAB005/" . $e;

              // $e1 = "/Imagenes/Productos/$id_familia->nom_fami/{{ $id_provee->nom }}/{{ $resultados->id_produc }}" . $e;

             
              
              echo "<img   src='$e1'  style=' width: 30%; height: 30%;     position: sticky;' >  ";
            }

      

          ?>





        </div> {{-- TERMINA TITUTLO 40% --}}



        <div id="footermodalupdate"> {{--INICIA EL FOOTER--}}
          <button type="submit" class="modal-close waves-effect waves-green btn-flat">Agree</button>
          <button class="modal-action modal-close waves-effect waves-red btn red lighten-1"
            id="cerrarmodal">Cerrar</button>
        </div> {{--TERMINA EL FOOTER--}}

      </article>{{-- TERMINA 40% PARA MOSTRAR IMAGENES DEL PRODUCTO--}}


    </div> {{--TERMINA BODY--}}
    <!--EndBody-->
  </div> {{--TERMINA CONTENT--}}


</div>{{--TERMINA MODAL--}}