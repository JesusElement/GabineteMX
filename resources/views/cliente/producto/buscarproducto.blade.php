@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
    <?php   
    //Aqui por si quiere ver productos por marca seleccionada  
    if (isset($_GET['marcaCheck'])) {
     $buscarMarca = $_GET['marcaCheck'];
    $buscarFam = $_GET['fam'];
      $porMarca = DB::select("SELECT * FROM producto as p INNER JOIN proveedor as prov ON p.id_provee = prov.id_provee INNER JOIN familia as fa ON p.id_familia = fa.id_familia WHERE prov.nom = '$buscarMarca' AND fa.nom_fami = '$buscarFam'");
    
      $NomMar = $buscarFam;
     
      //Necesitas buscar tambien el rpoducto por familia si no te imprime todos los productops de una marca ignopradnof la familia
      $nomprovee = DB ::select("SELECT DISTINCT nom FROM proveedor as pv INNER JOIN producto as p on pv.id_provee = p.id_provee INNER JOIN familia as f on p.id_familia = f.id_familia WHERE f.nom_fami = '$buscarFam'"); 
    }else{
  
    if (isset($_GET["cate"]) && $_GET["cate"] != "") {
    
      $catego = $_GET["cate"];  
          //Esto optiene todos los productos 
        $producto= DB::select("SELECT * FROM producto WHERE id_familia = '$catego';");
          //esto optiene toda la familia del producto
        $nomcate= DB::select("SELECT nom_fami FROM familia WHERE id_familia = '$catego';");
        foreach($nomcate as $nom){
         $NomMar =  $nom->nom_fami;
        }
        $nomprovee = DB ::select("SELECT DISTINCT nom FROM proveedor as pv INNER JOIN producto as p ON pv.id_provee = p.id_provee INNER JOIN familia as fa ON fa.id_familia = p.id_familia WHERE fa.id_familia = '$catego'"); 
    } 
  }   
      //esto es para seleccionar solo una ves los proveedores de todos los productos   
     
?>
    <div class="buscarproductoCss">
        <div class="barraproductoCss">
            <h5>Tenemos los siguientes productos en la sección de: <?php echo("<span id='NomMar'>".$NomMar."</span>");?></h5>
        </div>
        <div class="filtroproductoCss">
            <h4>Opciones</h4>
            <hr>
            <br>
            <form>          
              <select id="buscarcheck" multiple="multiple">
        <option value="" disabled selected>Marcas:</option>
        @foreach($nomprovee as $nomp)
        <option>{{$nomp->nom}}</option>     
         @endforeach
            </select>
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
  @if(isset($producto))
    @if($producto !=  null)
      @foreach($producto as $productob)
  <tr>
  <td>{{$productob->titulo}}</td>
  <td>{{$productob->datos}}</td>
  </tr>
      @endforeach
    @endif
    @else
      @foreach($porMarca as $productob)
  <tr>
  <td>{{$productob->titulo}}</td>
  <td>{{$productob->datos}}</td>
  </tr>
     @endforeach

  @endif
</table>

        </div>
</div>
        @endsection