@extends('layouts/plantilla')
@section('seccion')
<!-- Inicia Contenido -->
<div class="contenido">
  <div class="actualizarProductoCss">
    <div class="actProTabCss">
      <h3>DASHBOARD</h3>
      <table style="">
        <tr>
          <th>Tipo</th> {{--   id_familia --}}
          <th>Subtipo</th> {{--   clav_clas --}}
          <th>Provedor</th> {{--   id_provee --}}
          <th>Nombre</th> {{--   titulo --}}
          <th>Descripcion</th> {{--   datos --}}
          <th>Opciones</th> {{-- actualizarEliminar --}}


        </tr>

        @foreach($resultado ?? '' as $resultados)
        <tr>
          <td>{{ $resultados->nom_fami}}</td>
          <td>{{ $resultados->name}}</td>
          <td>{{ $resultados->nom}}</td>
          <td>{{ $resultados->titutlo}}</td>
          <td>{{ $resultados->datos}}</td>
          <td style="width: 170px;"><a class="waves-effect waves-light btn blue darken-4"><i
                class="small material-icons left">arrow_upward</i>Actualizar</a><a
              class="waves-effect waves-light btn red accent-4 btnacP"><i
                class="small material-icons left">warning</i>Eliminar</a></td>

        </tr>
        @endforeach




      </table>

    </div>
    <br>


  </div>

</div>
<!-- Termina contenido -->
@endsection