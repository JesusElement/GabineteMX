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
                <span>Agregar Tarjeta:
                    <a href="{{ route('RegistroT',['create'=>'creacionT']) }}"
                        class="btn btn-info">
                        <ion-icon name="card-outline"></ion-icon>
                    </a>
                </span>
                <table class="tabla centered responsive-table">
                    <thead>
                        <tr>
                            <th>Tarjeta</th>
                            <th>Propietario</th>
                            <th>Fecha de expiracion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                       $user = auth()->user()->id_cliente;
                       $direc = DB::select('SELECT * FROM `cli_m_pago` WHERE id_cliente = ?', [$user]);
                    foreach($direc as $value){
                           $card= $value->num_tar;
                           $nom = $value->nom_card; 
                          $expi = $value->expi;
                           $id=$value->id_pago;
                           $id = ($id*263412432)/2;
                        $key="Una oracion al santro padre 3425ytsdfhvbdfs ";
                        list($encrypted_data, $iv) = explode('::', base64_decode($card), 2);
                        $valor = openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
                       $real = substr($valor,14,16);

                       ?>
                        <tr>
                            <td><?php echo "**** ".$real ?> </td>
                            <td><?php echo $nom ?> </td>
                            <td><?php echo $expi ?> </td>
                            <td> <a href="{{ route('RegistroT',['update'=>'update','idcard'=>$id]) }}"
                                    class="btn btn-warning">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a> </td>
                            <td> <a href="{{ route('RegistroT',['delete'=>'delete','idcard'=>$id]) }}"
                                    class="btn btn-danger">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a> </td>
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