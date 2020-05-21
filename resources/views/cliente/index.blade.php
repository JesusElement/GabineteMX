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
                       Nombre: {{auth()->user()->nom}} {{auth()->user()->ape1}} {{auth()->user()->ape2}}
                    </h6>
                    <p>
                        Correo: <b>{{auth()->user()->email}}</b>
                    </p>
                    <p>
                        Telefono: <b>{{auth()->user()->telefono}}</b>
                    </p>
            </div>

        </div>

        <div class="opcionesC">
            <div class="opcion1">
                <ul>
                    <li><a>Mis Pedidos</a></li>
                    <li><a>Mi carrito</a></li>
                    <li><a>Mis Productos Comprados</a></li>
                </ul>

            </div>
            <div class="opcion2">
            <ul>
                    <li><a href="{{route('MePaCli')}}">Mis Metodos de Pagos</a></li>
                    <li><a>Mis Direcciones</a></li>
                    <li class="red-i"><a>Cancelar mi cuenta</a></li>
                </ul>
            </div>

        </div>

    </div>

</div>


@endsection