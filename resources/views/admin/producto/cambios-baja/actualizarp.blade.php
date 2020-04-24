@extends('layouts/plantilla')
@section('seccion')
<!-- Inicia Contenido -->
<div class="contenido">
    <table style="width:70% ">
        <tr>
          <th>Tipo</th>     {{--   id_familia --}}
          <th>Subtipo</th>  {{--   clav_clas --}}
          <th>Provedor</th>   {{--   id_provee --}}
          <th>Nombre</th>      {{--   titulo --}}
          <th>Descripcion</th>      {{--   datos --}}
          <th>BOTONES</th>      {{--   amarillo update rojo delete --}}

        </tr>
       
          @foreach($resultado ?? '' as $resultados)
          <tr>
          <td>{{ $resultados->nom_fami}}</td>
          <td>{{ $resultados->name}}</td>
          <td>{{ $resultados->nom}}</td>
          <td>{{ $resultados->titutlo}}</td>
          <td>{{ $resultados->datos}}</td>
         
        </tr>
        @endforeach

       

        
      </table>
      <br>
      <br>
      <br>
      <br>
      <br>

      <br>
      
      
      

</div>



<!-- Termina contenido -->
@endsection