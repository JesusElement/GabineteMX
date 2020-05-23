@extends('layouts.plantilla')

@section('seccion')

<?php

    $user = auth()->user()->id_cliente;
    $direc = DB::select('SELECT a.* FROM direccion as a, direc_cliente as b, cliente as c WHERE a.id_direc = b.id_direc && b.id_cliente = c.id_cliente && c.id_cliente = ? ', [$user]);
    foreach($direc as $value){
        $direccion = $value->alias." ".$value->calle." ".$value->numero." ".$value->colonia; 

    }

?>

<div class="OpcionesCuen">
    <div class="opcionCu">
        <div class="ImgInfo">
            <div class="ImgC">
                <img src="Imagenes/Clientes/fotoDe.jpg">
            </div>
            <div class="InfoC">
                <h6>
                    Nombre: {{ auth()->user()->nom }} {{ auth()->user()->ape1 }} {{ auth()->user()->ape2 }}
                </h6>
                <p>
                    Correo: <b>{{ auth()->user()->email }}</b>
                </p>
                <p>
                    Telefono: <b>{{ auth()->user()->telefono }}</b>
                </p>
                <span> <a class="btn btn-info"
                        href="{{ route('EditInfoCli',['id'=>$user]) }}">Editar
                        perfil</a> </span>
            </div>

        </div>

        <div class="opcionesC">
            <div class="opcion1">
                <ul>
                    <li><a href="{{ route('verped') }}">Mis Pedidos</a></li>
                    <li><a href="{{ route('verCarrito') }}">Mi carrito</a></li>
                    <li><a>Mis Productos Comprados</a></li>
                </ul>

            </div>
            <div class="opcion2">
                <ul>
                    <li><a href="{{ route('MePaCli') }}">Mis Metodos de Pagos</a></li>
                    <li><a href="{{ route('Direcciones') }}">Mis Direcciones</a></li>
                    <li class="red-i"><a class="modal-trigger" href="#cerrarCuenta">Cancelar mi cuenta</a></li>
                </ul>
            </div>

        </div>

    </div>

</div>


<div id="cerrarCuenta" class="modal">
    <div class="modal-content">
        <h4>¡Eliminar mi cuenta!</h4>
        <p>¿Estas seguro de eliminar tu cuenta de GabineteMX?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</a>
        <foRm
            action="{{ route('CerrarCuenta',['id'=>auth()->user()->id_cliente]) }}"
            method="POST">
            @method('DELETE')
            @csrf
            <button style="color:red" type="submit" class="modal-close waves-effect waves-green btn-flat">Eliminar mi
                cuenta</button>
            </from>

    </div>
</div>


@endsection