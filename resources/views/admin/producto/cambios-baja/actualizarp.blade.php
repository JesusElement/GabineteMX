<style>
body {
   display:flex;
   flex-direction:row;
   justify-content:center;
   align-items:center;
   overflow:hidden;
   
   height:100vh;
   
   font-family:"Roboto", sans-serif;
   .loader {
      display:flex;
      //align-items:baseline;
      
      font-size:2em;
      
      .dots {
         display:flex;
         position: relative;
         top:20px;
         left:-10px;
         
         width:100px;
         
         animation: dots 4s ease infinite 1s;
         div {
            position: relative;
            
            width:10px;
            height:10px;
            margin-right:10px;
            border-radius:100%;
            
            background-color:black;
            &:nth-child(1) {
               width:0px;
               height:0px;
               margin:5px;
               margin-right:15px;
               animation: show-dot 4s ease-out infinite 1s;
            }
            &:nth-child(4) {
               background-color:transparent;
               
               animation: dot-fall-left 4s linear infinite 1s;
               
               &:before {
                  position: absolute;
            
                  width:10px;
                  height:10px;
                  margin-right:10px;
                  border-radius:100%;

                  background-color:black;
                  
                  content: '';
               
                  animation: dot-fall-top 4s cubic-bezier(0.46, 0.02, 0.94, 0.54) infinite 1s;
               }
            }
         }
      }
   }
}

@keyframes dots {
   0% {
      left:-10px;
   }
   20%,100% {
      left:10px;
   }
}

@keyframes show-dot {
   0%,20% {
      width:0px;
      height:0px;
      margin:5px;
      margin-right:15px;
   }
   30%,100% {
      width:10px;
      height:10px;
      margin:0px;
      margin-right:10px;
   }
}

@keyframes dot-fall-left {
   0%, 5% {
      left:0px;
   }
   100% {
      left:200px;
   }
}

@keyframes dot-fall-top {
   0%, 5% {
      top:0px;
   }
   30%,100% {
      top:50vh;
   }
}


</style>

<div class="loader">
  <div class="text">Loading</div>
  <div class="dots">
     <div></div>
     <div></div>
     <div></div>
     <div></div>
  </div>
</div>





{{-- 
TERMINA LOADER --}}

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
          @foreach($resultado as $resultados)
          <tr>
            <td>{{ $resultados->nom_fami }}</td>
            <td>{{ $resultados->name }}</td>
            <td>{{ $resultados->nom }}</td>
            <td>{{ $resultados->titulo }}</td>
            <td>{{ $resultados->datos }}</td>
            <td style="width: 170px;">

              <button data-target="#actualizarproducto{{ $resultados->id_produc }}"
                class="btn modal-trigger waves-effect waves-light btn yellow accent-4 btnacP">
                <i class="small material-icons left">arrow_upward</i> Actualizar
              </button>

              <button data-target="#eliminarproducto{{ $resultados->id_produc }}"
                class="btn modal-trigger waves-effect waves-light btn red accent-4 btnacP">
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