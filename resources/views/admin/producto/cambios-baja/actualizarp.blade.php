@extends('layouts/plantilla')
@section('seccion')

<!-- Inicia Contenido -->
<div class="contenido">
  <div class="actualizarProductoCss">
    <div class="actProTabCss">
      <h3>DASHBOARD</h3>
      <table class="table-responsive">
        <thead>
        <tr>
            <th>Tipo</th> {{-- id_familia --}}
            <th>Subtipo</th> {{-- clav_clas --}}
            <th>Provedor</th> {{-- id_provee --}}
            <th>Nombre</th> {{-- titulo --}}
            <th>Descripcion</th> {{-- datos --}}
            <th>Opciones</th> {{-- actualizarEliminar --}}
        </tr>
        </thead>
        <tbody>
            @foreach($resultado  as $resultados)
            <tr>
              <td>{{ $resultados->nom_fami }}</td>
              <td>{{ $resultados->name }}</td>
              <td>{{ $resultados->nom }}</td>
              <td>{{ $resultados->titutlo }}</td>
              <td>{{ $resultados->datos }}</td>
              <td style="width: 170px;">
               
                <button data-target="#actualizarproducto{{$resultados->id_produc}}" class="btn modal-trigger waves-effect waves-light btn yellow accent-4 btnacP">
                <i class="small material-icons left">arrow_upward</i> Actualizar 
                </button>

<a type="button" class="waves-effect waves-light btn red accent-4 btnacP"><i class="small material-icons left">warning</i>Eliminar</a>
              


            </tr>
            @include('admin.producto.cambios-baja.modalactualizar')
          @endforeach
          </tbody>
</table>

</div>
</div>
</div>
<!-- Termina contenido -->
@endsection