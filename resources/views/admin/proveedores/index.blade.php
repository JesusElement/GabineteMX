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

@if(session('errorbaja'))
    <script>
        swal({
            icon: "error",
            text: "Algunos productos dependen de este proveedor, elimine los productos primero",
        });
        
    </script>
   
@endif



<div class="contenido">
    <div class="actualizarProductoCss">
        <div class="actProTabCss">
            <h3>Gestionar proveedores.</h3>
          
            <table class="tabla" id="tablaproveedores">
                <thead>
                    <tr>
                        <th style="width: 5%;"><span>ID Proveedor </span></th> {{-- id_provee --}}
                        <th style="width: 5%;"><span>Nombre </span></th> {{-- nom --}}
                        <th style="width: 5%;"><span>Nombre Organizacion </span></th> {{-- nom_or --}}
                        <th style="width: 5%;"><span>Correo </span></th> {{-- correo --}}
                        <th style="width: 5%;"><span>Telefono </span></th> {{-- telefono --}}
                        <th style="width: 5%;"><span>Razon Social </span></th> {{-- razon_s --}}
                        <th style="width: 15%;"><span>Direccion </span></th> {{-- direccion --}}
                        <th style="width: 5%;"><span>CP</span></th> {{-- cp --}}
                        <th style="width: 5%;"><span>RFC</span></th> {{-- rfc --}}
                        <th style="width: 25%;">Opciones. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                            <button data-target="#altaproveedores"
                                class="btn modal-trigger waves-effect waves-light btn green accent-3 btnacP"
                                style="width:55%; height: 45px;">
                                <i class="large material-icons left">arrow_upward</i>Agregar
                            </button>

                        </th> {{-- actualizarEliminar --}}

                    </tr>

                </thead>
                <tbody>
                    @foreach($resultado ?? '' as $resultados)
                        <tr>

                            <td>{{ $resultados->id_provee }}</td>
                            <td>{{ $resultados->nom }} </td>
                            <td>{{ $resultados->nom_or }} </td>
                            <td>{{ $resultados->correo }} </td>
                            <td>{{ $resultados->telefono }} </td>
                            <td>{{ $resultados->razon_s }} </td>
                            <td>{{ $resultados->direccion }}</td>
                            <td>{{ $resultados->cp }} </td>
                            <td>{{ $resultados->rfc }} </td>





                            <td style="width: 35%;">
                                {{-- <button data-target="#altapromocion"
                class="btn modal-trigger waves-effect waves-light btn green accent-3 btnacP" style="width: 45px; height: 45px;">
                <i class="large material-icons left">arrow_upward</i> 
              </button>&nbsp; --}}

                                {{-- <button data-target="#actualizarproducto{{ $resultados->id_produc }}"
                                --}}


                                <button data-target="#cambioproveedores{{ $resultados->id_provee }}"
                                    class="btn modal-trigger waves-effect waves-light btn amber accent-3 btnacP"
                                    style="width: 45px; height: 45px;">
                                    <i class="small material-icons left">update</i>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                {{-- <button data-target="#informacionproducto{{ $resultados->id_produc }}"
                                --}}
                                <button data-target="#bajaproveedores{{ $resultados->id_provee }}"
                                    class="btn modal-trigger waves-effect waves-light btn  deep-orange accent-3 btnacP"
                                    style="width: 45px; height: 45px;">
                                    <i class="small material-icons left">clear</i>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                            </td>
                        </tr>
                        {{-- @include('admin.producto.promocion.modalespromocion.modalaltas') --}}
                        @include('admin.proveedores.modales.altaproveedores')
                        @include('admin.proveedores.modales.bajaproveedores')
                        @include('admin.proveedores.modales.cambioproveedores')


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