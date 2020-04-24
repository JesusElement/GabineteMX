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
       
          @foreach($producto ?? '' as $productos)
          <tr>
          <td>{{ $productos->id_familia}}</td>
          <td>{{ $productos->clav_clas}}</td>
          <td>{{ $productos->id_provee}}</td>
          <td>{{ $productos->titutlo}}</td>
          <td>{{ $productos->datos}}</td>
         
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