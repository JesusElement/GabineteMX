@extends('layouts.plantilla')
@section('seccion')
        <?php
        if(isset($_GET['num_produc'])){
        $produc = $_GET['num_produc'];
        $fech_ac = date("Y-m-s");
        $hora = date("H:i:s");
        $comproba = DB::select('SELECT count(*) as prub FROM `producto` WHERE `id_produc` = ? ', [$produc]);
            if($comproba[0]->prub == 1){

                $comproba2 = DB::select('SELECT count(*) as prub FROM `oferta` WHERE `id_produc` = ? && `fech_ini` <= ? && `hora_ini` <= ? && `fech_ter` >= ? ', [$produc,$fech_ac,$hora,$hora,$fech_ac]);

                if($comproba2[0]->prub == 1){

                    $productos = DB::select('SELECT * from `producto` as `a` inner join `stock` as `c` on `c`.`id_produc` = `a`.`id_produc` inner join `familia` as `d` on `d`.`id_familia` = `a`.`id_familia` inner join `proveedor` as `e` on `e`.`id_provee` = `a`.`id_provee` inner join `oferta` as `o` on `o`.`id_produc` = `a`.`id_produc` where `a`.`id_produc` = ?', [$produc]);
                    $pro=1;
                }
                else{

                    $productos = DB::select('SELECT * from `producto` as `a` inner join `stock` as `c` on `c`.`id_produc` = `a`.`id_produc` inner join `familia` as `d` on `d`.`id_familia` = `a`.`id_familia` inner join `proveedor` as `e` on `e`.`id_provee` = `a`.`id_provee` where `a`.`id_produc` = ?', [$produc]);
                    $pro=0;
                }
            }
        ?>
        <!-- Inicia Contenido -->
        <div class="contenido">
            <div class="producto">
            @foreach($productos as $producto)
                <div style="" class="marizq">
                        <?php

                    $carpeta = @scandir("./Imagenes/Productos/$producto->nom_fami/$producto->nom/$producto->id_produc");
                    if (count($carpeta)>2){     
                      $d = opendir("./Imagenes/Productos/$producto->nom_fami/$producto->nom/$producto->id_produc/");
                    while (($e = readdir($d)) != false)
                      if ($e != '.' && $e != '..') {
                            $i = 1;
                            echo"<div class='img'.$i.''>";
                         $e1 = "/Imagenes/Productos/$producto->nom_fami/$producto->nom/$producto->id_produc/" . $e;
                        echo "<img class='imgsize responsive-img materialboxed'  src='$e1'     ' ></div>  ";
                        $i++;  
                      }

                    }else{
                        echo "<img   src='/imagenes/nodisponible.jpg'  style=' width: 30%; height: 30%;     position: sticky;' >  ";
                      }
                    ?>
                                        
                </div>
                <div style="" class="imagenProducto">
                <img class="responsive-img materialboxed" src="Imagenes/Productos/{{$producto->nom_fami}}/{{$producto->nom}}/{{$producto->id_produc}}/1.jpg">
                </div>
                <div style="" class="infoProducto">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card white darken-1">
                                <div class=" card-content white-text">
                                @php 
                                if(isset($producto->titulo)){

                                }
                                @endphp
                                    <span class="card-title">{{ $producto->titulo }}</span>
                                    <i class="tiny material-icons star">star</i>
                                    <i class="tiny material-icons star">star</i>
                                    <i class="tiny material-icons star">star</i>
                                    <i class="tiny material-icons star">star</i>
                                    <i class="tiny material-icons star">star</i>
                                    @php 


                                   


                                    $idp=$producto->id_produc;


                                    // $flag=DB::table('stock')
                                    // ->join('oferta','oferta.id_produc','=','stock.id_produc')
                                    // ->select('oferta.id_oferta','oferta.desc','stock.id_produc', 
                                    // DB::raw('(case when oferta.desc is null then 0 else 1 end) as promocionflag'))
                                    // ->where('oferta.id_produc','=',$idp)->first();

                                    // select  oferta.id_produc,oferta.desc,stock.prec_uni  
                                    // from oferta INNER JOIN stock 
                                    //where stock.id_produc=oferta.id_produc
                                    try {
                                        $flag=DB::table('oferta')
                                    ->join('stock','oferta.id_produc','=','stock.id_produc')
                                    ->select('oferta.id_produc','oferta.desc','stock.prec_uni',
                                    DB::raw('(case when oferta.desc is null then 0 else 1 end) as promocionflag'))
                                    ->where('oferta.id_produc','=',$idp)->first();
                                        
                                    if($flag->promocionflag == 1){
                                        $desc = $producto->prec_uni * ($flag->desc / 100 );
                                        $precio = $producto->prec_uni - $desc;
                                        $precio = round($precio, 2);
                                    }
                                    else {
                                        $precio = $producto->prec_uni;
                                    }



                                    } catch (\Throwable $th) {
                                        $idp=$producto->id_produc;
                                        $precio = $producto->prec_uni;
                                    }
                                   

                                    

                                   
                           




                                
                                    @endphp
                                    <h5 class="black-text">Precio:${{number_format($precio,2)}}  </h5>
                                    <h6 class="black-text">En existencia: {{$producto->stock}}  </h6>
                                </div>
                                <div class="card-action">
                                <h6 class="black-text">Caracteristicas  </h6>
                                @php 
                                 $datos = str_replace("*/*", '</br>', $producto->datos);
                                 $datos = explode('*/*',$producto->datos);
                                 foreach ($datos as $key){
                                    if($key == 'No'){
                                       echo '<li> Graficos Integrados: '.$key.'</li>';
                                    }
                                    else if ($key == 'Si'){
                                       echo '<li> Graficos Integrados: '.$key.'</li>';
                                    }
                                    else{
                                       echo '<li>'.$key.'</li>';
                                    }
                                 }
                                @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="" class="opCarrito">

                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card white darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                Carrito de compras
                                    </span>
                             
                                </div>
                                <div class="card-action">
                                    <div class="input-field col s12">
                                        <select>
                                          <option value="" disabled selected>Cantidad</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                        </select>
                                        <label>Seleccione una cantidad</label>
                                      </div>
                                    <a href="Carrito.html" class="btn waves-effect waves-light btnAgregarCarrito">Agregar a carrito</a>
                                    <br>
                                    <a href="#" class="btn waves-effect waves-light btnComprar">Comprar ahora</a>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <?php
                $produc = $_GET['num_produc'];
                $coments = DB::select('SELECT * FROM `comentario` WHERE `id_produc` = ? ', [$produc]);
                    
                ?>
                
                <!-- Inicia contenido productos relacionados -->
                <div class="comentarioProducto">
                    <div class="CreaComent">
                    <h5 class="black-text"> Deja tu comentario </h5>
                        <form id="comentariouser" action="" method="POST" enctype="multipart/form-data">
                            <textarea id="WCU" rows="4" cols="30" >  </textarea>
                            <div class="Estrella">
                            <h6 class="black-text"> Calificalo </h6>
                            <input id="radio1" type="radio" name="estrellas" value="5"><!--
                                --><label class="scome" for="radio1">★</label><!--
                                --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                                --><label class="scome" for="radio2">★</label><!--
                                --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                                --><label class="scome" for="radio3">★</label><!--
                                --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                                --><label class="scome" for="radio4">★</label><!--
                                --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                                --><label class="scome" for="radio5">★</label>
                            </div>
                            
                            <input id="ECE" type="submit" class="btn btn-info" value="Enviar">
                            
                        </form>
                    </div>
                    <div class="tituloC"> <h5 class="black-text"> Opiniones de los usuarios </h5>  </div>
                    @foreach ($coments as $coment)
                        <div>
                        <i class="small material-icons">account_box</i>
                        </div>
                        <div>
                            <p>Comentario</p>
                            <p>{{$coment->coment}}</p>
                        </div>
        
                        <div>
                            <p>Estrellas</p>
                            <div class="Estrella2">
                            @php
                            $star = $coment->star;
                            if($star==5){
                            @endphp
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                            @php
                            }
                            else if($star==4){
                            @endphp
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV">★</label>
                            @php
                            }
                            else if($star==3){
                            @endphp
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV">★</label>
                                <label class="StarComentV">★</label>
                            @php
                            }
                            else if($star==4){
                                @endphp
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV">★</label>
                                <label class="StarComentV">★</label>
                                <label class="StarComentV">★</label>
                            @php
                            }
                            else{
                                @endphp
                                <label class="StarComentV check">★</label>
                                <label class="StarComentV">★</label>
                                <label class="StarComentV">★</label>
                                <label class="StarComentV">★</label>
                                <label class="StarComentV">★</label>
                                @php
                            }
                            @endphp
                            
                            </div>
                        </div>
                    @endforeach
                </div>
                <?php
                }
                else{
                ?>
            <div class="contenido">
                    <div class="producto">
                    
                    <div style="" class="infoProducto">
                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card white darken-1">
                                        <div class=" card-content white-text">
                                            <span class="card-title">No se encontro ningun producto</span>
                                            
                                            <h5 class="black-text">Por favor verifique que haya seleccionado un producto de manera correcta, si el error persiste favor de comunicarse con nuestro equipo para atender el problema.</h5>
                                        </div>
                                        <div class="card-action">
                                        <h6 class="black-text"><a href="{{route('index')}}"> Regresar el inicio</a>  </h6>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
        
            </div>
        
        <?php
                }
        ?>
                <div style="" class="marder">

                </div>
               
            </div>
        </div>
        <!-- Termina contenido -->

@endsection