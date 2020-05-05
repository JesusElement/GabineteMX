@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
    <?php     
    if (isset($_GET['marcaCheck'])) {
      echo "La marca es :".$buscarMarca = $_GET['marcaCheck'];
    } 
    if (isset($_GET["cate"])) {
      $catego = $_GET["cate"];  
          //Esto optiene todos los productos 
        $producto= DB::select("SELECT * FROM producto WHERE id_familia = '$catego';");
          //esto optiene toda la familia del producto
        $nomcate= DB::select("SELECT nom_fami FROM familia WHERE id_familia = '$catego';");
    }    
      //esto es para seleccionar solo una ves los proveedores de todos los productos   
      $nomprovee = DB ::select("SELECT DISTINCT nom FROM proveedor as pv INNER JOIN producto as p ON pv.id_provee = p.id_provee INNER JOIN familia as fa ON fa.id_familia = p.id_familia WHERE fa.id_familia = '$catego'");
?>
    <div class="buscarproductoCss">
        <div class="barraproductoCss">
           
           @foreach($nomcate as $nom)
            <h5>En la sección de {{$nom->nom_fami}}</h5>
          @endforeach
    
        </div>
        <div class="filtroproductoCss">
            <h4>Opciones</h4>
            <hr>
            <br>
            <form id="buscarcheck">
            @foreach($nomprovee as $nomp)
            <p>
             <label>
               <!--AQUI ES DONDE YA NO ENCUENTRO QUE HACER, SOLO QUIERO 
                MANDAR EL VALOR SELECCIONADO PARA HACER LA CONSULTA DESPUES-->
             <input  type="checkbox" name=""  value="{{$nomp->nom}}">
         <span>{{$nomp->nom}}</span>
          </label>
        </p>
             @endforeach
            </form>
        </div>
        <div class="mostradorproductoCss">

           
    @php
    if(isset($productob->titulo)){

    }
    @endphp

        <table style="width:80%">
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