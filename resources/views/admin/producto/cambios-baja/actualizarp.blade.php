@extends('layouts/plantilla')
@section('seccion')
<!-- Inicia Contenido -->
@if(session('alertalta'))
  <script>
    swal({
      icon: "success",
      text: "¡Alta realizada!",
    });
  </script>
@endif
@if(session('alertbaja'))
  <script>
    swal({
      icon: "error",
      text: "¡Baja realizada!",
    });
  </script>
@endif
@if(session('alertact'))
  <script>
    swal({
      icon: "success",
      text: "¡Actualizacion realizada!",
    });
  </script>
@endif
<div class="contenido">
  <div class="actualizarProductoCss">
    <div class="actProTabCss">
      <h3>Gestion de productos</h3>
      <div>

      </div>
      <table class="tabla" id="tablaproductos">
        <thead>
          <tr>
            <th><span>Tipo.</span></th> {{-- id_familia --}}
            <th><span>Subtipo.</span></th> {{-- clav_clas --}}
            <th><span>Provedor.</span></th> {{-- id_provee --}}
            <th><span>Nombre.</span></th> {{-- titulo --}}
            <th><span>Descripcion.</span></th> {{-- datos --}}
            <th><span>Stock.</span></th> {{-- stock --}}
            <th><span>Precio U.</span></th> {{-- prec uni --}}
            <th>Opciones. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


              <button class="btn  waves-effect waves-light btn green accent-3 btnacP" style="width:35%; height: 45px;"
                onclick="window.location='{{ url('/admin/altaproducto') }}'">
                <i class="large material-icons left">arrow_upward</i>Agregar
              </button>
            </th> {{-- actualizarEliminar --}}
          </tr>

        </thead>
        <tbody>
          @foreach($resultado as $resultados)
            <tr>
              <td>{{ $resultados->nom_fami }}</td>
              <td>{{ $resultados->name }}</td>
              <td>{{ $resultados->nom }}</td>
              <td>{{ $resultados->titulo }}</td>
              <td>{{ $resultados->datos }}</td>
              <td>{{ $resultados->stock }}</td>
              <td>{{ $resultados->prec_uni }}</td>



              <td style="width: 170px;">

                <button data-target="#actualizarproducto{{ $resultados->id_produc }}"
                  class="btn modal-trigger waves-effect waves-light btn amber accent-3 btnacP">
                  <i class="small material-icons left">update</i> Actualizar
                </button>

                <button data-target="#eliminarproducto{{ $resultados->id_produc }}"
                  class="btn modal-trigger waves-effect waves-light btn  deep-orange accent-3 btnacP">
                  <i class="small material-icons left">clear</i> Eliminar
                </button>
              </td>
            </tr>
            @include('admin.producto.cambios-baja.modalactualizar')
            @include('admin.producto.cambios-baja.modaleliminar')
          @endforeach
        </tbody>
      </table>
      <br>
      <br>
      {{ $resultado->render("pagination::materialize-ui") }}

      {{-- SI QUIEREN MODIFICAR LA PAGINACION DE MATERIALIZE AQUI ESTA LA RUTA
     \GabineteMX\vendor\laravel\framework\src\Illuminate\Pagination\resources\views\materialize-ui.blade.php --}}
      <br>
      <br>

    </div>
  </div>
</div>
<!-- Termina contenido -->
@endsection