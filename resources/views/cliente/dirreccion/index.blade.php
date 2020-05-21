@extends('layouts.plantilla')

@section('seccion')

<div class="OpcionesCuen">
    <div class="opcionCu">
        <div class="ImgInfo">
            <div class="ImgC">
                <img src="../../Imagenes/Clientes/fotoDe.jpg">
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

        <div class="opcionesMPC">
            <div class="opcion3">
                <span> Agregar Direccion:
                    <a href="{{route('AddDirecP',['create'=>'creacionT'])}}" class="btn btn-info" ><ion-icon name="home-outline"></ion-icon></a>
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
                           <td> <a href="{{ route('DireccionesActu',['tipo'=>'update','id'=>$id ]) }}" class="btn btn-warning"><ion-icon name="create-outline"></ion-icon></a> </td>
                           <td> <a href="" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></a> </td>
                       </tr>
                        <?php
                    }
                    ?>
                   </tbody>
               </table>

            </div>

        </div>

    </div>

</div>

@endsection