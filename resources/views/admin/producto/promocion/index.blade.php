@extends('layouts/plantilla')
@section('seccion')
<!-- Inicia Contenido -->
<div class="contenido">
  <div class="actualizarProductoCss">
    <div class="actProTabCss">
      <h3>Gestionar promociones.</h3>
    
      <table class="tablaprom" id="tablapromociones" >
        <thead>
          <tr>
           {{-- <th><span>ID Oferta          </span></th> {{-- id_oferta --}}
            {{--<th><span>ID Producto        </span></th> {{-- id_product--}}
            <th><span>Nombre producto    </span></th> {{-- titulo --}}
            <th><span>Fecha de inicio    </span></th> {{-- fech_ini --}}
            <th><span>Fecha de termino   </span></th> {{-- fech_ter --}}
            <th><span>Hora de inicio     </span></th> {{-- hora_ini--}}
            <th><span>Hora de termino    </span></th> {{-- hora_ter--}}
            <th><span>Descuento          </span></th> {{-- desc--}}
            <th><span>Precio Normal      </span></th> {{-- costo_n--}}
            <th><span>Precio C/Descuento </span></th> {{-- costo_cd--}}
            <th>Opciones.                       </th> {{-- actualizarEliminar --}}
          </tr>
    
        </thead>
        <tbody>
          @foreach($resultado as $resultados)
          <tr>
            {{-- <td>{{ $resultados->id_oferta }}</td>
            <td>{{ $resultados->id_produc }}</td> --}}
            <td>{{ $resultados->titulo    }}</td>
            <td>{{ $resultados->fech_ini  }}</td>
            <td>{{ $resultados->fech_ter  }}</td>
            <td>{{ $resultados->hora_ini  }}</td>
            <td>{{ $resultados->hora_ter  }}</td>
            <td>{{ $resultados->desc      }}</td>
            <td>Precio normal</td>
            <td>Precio descuento</td>
       
     


            <td style="width: 20%;">
                <button
                class="btn modal-trigger waves-effect waves-light btn green accent-3 btnacP" style="width: 45px; height: 45px;">
                <i class="large material-icons left">arrow_upward</i> 
              </button>&nbsp;

              {{-- <button data-target="#actualizarproducto{{ $resultados->id_produc }}" --}}
                  <button
                class="btn modal-trigger waves-effect waves-light btn amber accent-3 btnacP" style="width: 45px; height: 45px;">
                <i class="small material-icons left">update</i> 
              </button>&nbsp;

              {{-- <button data-target="#informacionproducto{{ $resultados->id_produc }}" --}}
                  <button
                class="btn modal-trigger waves-effect waves-light btn  deep-orange accent-3 btnacP" style="width: 45px; height: 45px;">
                <i class="small material-icons left">clear</i> 
              </button>&nbsp;
              
              <button data-target="#informacionproducto{{ $resultados->id_produc }}"
              class="btn modal-trigger waves-effect waves-light btn  cyan darken-3 btnacP" style="width: 45px; height: 45px;">
              <i class="small material-icons left">info</i>
            </button>
            </td>
          </tr>
          @include('admin.producto.promocion.modalespromocion.modalaltas')  
          @include('admin.producto.promocion.modalespromocion.modalbajas')  
          @include('admin.producto.promocion.modalespromocion.modalcambios')  
          @include('admin.producto.promocion.modalespromocion.modalinfo')  
      
          @endforeach
        </tbody>
      </table>
      <br>
      <br>
      
      {{ $resultado->render("pagination::materialize-ui")}}

      {{-- SI QUIEREN MODIFICAR LA PAGINACION DE MATERIALIZE AQUI ESTA LA RUTA
     \GabineteMX\vendor\laravel\framework\src\Illuminate\Pagination\resources\views\materialize-ui.blade.php --}}
      <br>
      <br>

    </div>
  </div>
</div>
<!-- Termina contenido -->
@endsection