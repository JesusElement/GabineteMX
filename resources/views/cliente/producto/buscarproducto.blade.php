@extends('layouts.plantilla')

@section('seccion')
<div class="contenido">
    <?php      
           $catego = $_GET["cate"];   
           //Esto optiene todos los productos
        $producto= DB::select("SELECT * FROM producto WHERE id_familia = '$catego';");
            //esto optiene toda la familia del producto
        $nomcate= DB::select("SELECT nom_fami FROM familia WHERE id_familia = '$catego';");
      //esto es para seleccionar solo una ves los proveedores de todos los productos 
      $provee = DB::select("SELECT DISTINCT id_provee FROM producto WHERE id_familia = '$catego'");
     // $marcas = DB::select("SELECT nom_or FROM proveedor WHERE id_provee = '{$provedores->id_provee}'");
         
?>
    <div class="buscarproductoCss">
        <div class="barraproductoCss">
            @foreach($provee as $provees)
            {{$provees->id_provee}}
          
            @endforeach
           @foreach($nomcate as $nom)
            <h5>En la sección de {{$nom->nom_fami}} tenemos...</h5>
          @endforeach
        </div>
        <div class="filtroproductoCss">
            <h4>Opciones</h4>
            <hr>
            @foreach($producto as $marca)
            {{$marca->id_provee}}
             @endforeach
            
        </div>
        <div class="mostradorproductoCss">

           
    @php
    if(isset($productob->titulo)){

    }
    @endphp

        <table style="width:100%">
  <tr>
    <th>Titulo</th>
    <th>Datos</th>
  </tr>
  @foreach($producto as $productob)
  <tr>
  <td>{{$productob->titulo}}</td>
  <td>{{$productob->datos}}</td>
  </tr>
  @endforeach
</table>

        </div>
</div>
        @endsection