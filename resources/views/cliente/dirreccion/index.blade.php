@extends('layouts.plantilla')

@section('seccion')

<div class="OpcionesCuen">
    <div class="opcionCu">
        <div class="ImgInfo">
            <div class="ImgC">
                <a href="{{ route('CuentaCli') }}" class="btn btn-info regresa">Regresar</a>
                <img src="../../Imagenes/Clientes/fotoDe.jpg">
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
            </div>

        </div>

        <div class="opcionesMPC">
            <div class="opcion3">
                <span> Agregar Direccion:
                    <a href="{{ route('AddDirecP',['create'=>'creacionT']) }}"
                        class="btn btn-info">
                        <ion-icon name="home-outline"></ion-icon>
                    </a>
                </span>
                <table class="tabla centered responsive-table">
                    <thead>
                        <tr>
                            <th>Alias</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                       $user = auth()->user()->id_cliente;
                       $direc = DB::select('SELECT b.*, c.estado FROM direc_cliente as a, direccion as b, estado as c WHERE a.id_direc = b.id_direc && c.id_estado = b.id_estado && a.id_cliente = ?', [$user]);
                    foreach($direc as $value){
                           $alias = $value->alias;
                           $direccion = $value->calle." ".$value->numero." ".$value->colonia;
                           $estado= $value->estado;
                           $id = $value->id_direc;

                       ?>
                        <tr>
                            <td><?php echo $alias ?> </td>
                            <td><?php echo $direccion ?> </td>
                            <td><?php echo $estado ?> </td>
                            <td> <a href="{{ route('DireccionesActu',['tipo'=>'update','id'=>$id ]) }}"
                                    class="btn btn-warning">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a> </td>
                            <td> <a href="#{{ $id }}" class="btn btn-danger modal-trigger">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a> </td>
                        </tr>

                        <div id="{{ $id }}" class="modal">
                            <div class="modal-content" style="text-align: center">
                                <h4>¡Eliminar!</h4>
                                <p>¿Desea eliminar la direccion selecionada?</p>
                                <p>Alias: <b>{{ $alias }}</b> </p>
                                <p>Direccion: <b> {{ $direccion }}</b> </p>
                                <p> Estado: <b>{{ $estado }}</b></p>
                                <h5>Cuando lo elimine no lo podra recuperar</h5>
                            </div>
                            <div class="modal-footer">
                                <form method="post"
                                    action="{{ route('DirecDestroy',['id'=>$id ]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button style="color:black !important" type="submit"
                                        class="btn btn-danger">Eliminar</button>
                                </form>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>

<!-- Modal Structure -->



@endsection