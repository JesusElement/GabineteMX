@extends('layouts/plantilla')
@section('seccion')
<!-- Inicia Contenido -->
<div class="contenido">
  <div class="actualizarProductoCss">
    <div class="actProTabCss">
      <h3>DASHBOARD</h3>
      <div>

      </div>
      <table class="tabla" id="tablaproductos" >
        <thead>
          <tr>
            <th><span>Tipo.</span></th> {{-- id_familia --}}
            <th><span>Subtipo.</span></th> {{-- clav_clas --}}
            <th><span>Provedor.</span></th> {{-- id_provee --}}
            <th><span>Nombre.</span></th> {{-- titulo --}}
            <th><span>Descripcion.</span></th> {{-- datos --}}
            <th><span>Stock.</span></th> {{-- stock --}}
            <th><span>Precio U.</span></th> {{-- prec uni --}}
            <th>Opciones.</th> {{-- actualizarEliminar --}}
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
                class="btn modal-trigger waves-effect waves-light btn green accent-3 btnacP">
                <i class="small material-icons left">arrow_upward</i> Actualizar
              </button>

              <button data-target="#eliminarproducto{{ $resultados->id_produc }}"
                class="btn modal-trigger waves-effect waves-light btn  amber darken-3 btnacP">
                <i class="small material-icons left">warning</i> Eliminar
              </button>
          </tr>
          @include('admin.producto.cambios-baja.modalactualizar')
          @include('admin.producto.cambios-baja.modaleliminar')
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
<!-- Termina contenido -->
@endsection