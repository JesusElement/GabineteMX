@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">

  <div class="buscarproductoCss">
    <div class="barraproductoCss">
      <h4>En la sección de
        @foreach($Categoria as $item)
          <span id="NomMar">{{ $CateMar=$item->nom_fami }}</span>
        @endforeach

      </h4>
    </div>
    <div class="filtroproductoCss">
        <h5>Opciones</h5>
        <hr>
        <h6>Marcas:</h6>
        
        <div class="collection z-depth-3">
          @foreach($Marca as $Mar)
          <a href="{{ url("buscarproducto/{$Mar->nom}") }}"  class="collection-item">{{ $Mar->nom }}</a>
          @endforeach
        </div>
      
    </div>
    <div class="mostradorproductoCss">
      <h3>Contenido</h3>
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
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <br>
    <br>
    <br>
    {{ $resultado->render("pagination::materialize-ui") }}
  </div>
</div>
@endsection