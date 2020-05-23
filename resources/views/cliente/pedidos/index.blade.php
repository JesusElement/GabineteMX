@extends('layouts.plantilla')

@section('seccion')

<div class="OpcionesCuen">
    <div class="opcionCu">
        <div class="ImgInfo">
            <div class="ImgC">
            <a href="{{route('CuentaCli')}}" class="btn btn-info regresa">Regresar</a>
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
               <table class="tabla centered responsive-table">
                   <thead>
                       <tr>
                           <th>Folio</th>
                           <th>Numero de Rastreo</th>
                           <th>Productos</th>
                           <th>Total</th>
                           <th>Eliminar</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php

                       $user = auth()->user()->id_cliente;
                       $direc = DB::select('SELECT a.id_pedido, a.total, b.nom, a.num_rast FROM pedido as a, transporte as b WHERE b.id_trans = a.id_trans && a.id_cliente = ?', [$user]);
                    foreach($direc as $value){
                           $folio = $value->id_pedido;
                           $total= $value->total;
                           $trans = $value->nom;
                           $ras = $value->num_rast;
                       ?>
                       <tr>
                           <td><?php echo $folio ?> </td>
                           <td><?php echo $ras ?> </td>
                           <td>
                           <?php
                           $pro = DB::select('SELECT a.cantidad, a.precio_uni, b.titulo FROM deta_comp as a, producto as b WHERE a.id_produc = b.id_produc  && a.id_pedido = ?', [$folio]); 
                            foreach($pro as $value){
                              $productos = $value->titulo." ".$value->cantidad." X ".$value->precio_uni;
                              echo $productos = "<br>".$productos;
                            }
                              ?>
                           </td>
                           <td><?php echo $total ?> </td>
                           <td><a href="{{ url('/cliente/factura',['folio'=>$folio]) }}"
                            class="btn btn-warning"> <ion-icon name="trash-outline"></ion-icon></a> </td>
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

<!-- Modal Structure -->



@endsection