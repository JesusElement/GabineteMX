@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
  <?php   
    //Seccion para busqueda directa en la zona de buscar
if(isset($_GET["search"])){
          echo "Busqueda:".$buscar = $_GET["search"]; 
          $Prueba = DB::select("SELECT nom FROM proveedor WHERE nom LIKE '%$buscar%'");
          if ($Prueba != null ) {
            //IMPRIME POR MARCA, PROVEEDOR
            print_r($Prueba);
            foreach($Prueba as $row){
               $BusquedaProve =  $row->nom;
            }
           echo $BusquedaProve;
              $PorMarca = DB::select("SELECT * FROM producto as p INNER JOIN proveedor as prov ON p.id_provee = prov.id_provee INNER JOIN familia as fa ON p.id_familia = fa.id_familia WHERE prov.nom = '$BusquedaProve'");
              $NomMar = $BusquedaProve;
              $nomprovee = DB ::select("SELECT DISTINCT nom FROM proveedor as pv INNER JOIN producto as p ON pv.id_provee = p.id_provee INNER JOIN familia as fa ON fa.id_familia = p.id_familia WHERE fa.id_familia = '$BusquedaProve'");
          
          }else{
            $Prueba = DB::select("SELECT * FROM familia where nom_fami LIKE '%$buscar%'");
            print_r($Prueba);
          }
        
         
 }else{
       
          //echo"No se encontro nada de: ".$buscar;
}
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

      @if(isset($NomMar) && $NomMar != null)  
        @php
          $EstadoBusqueda = 1;
        @endphp
        <h5>Tenemos los siguientes productos en la sección de: <?php echo("<span id='NomMar'>".$NomMar."</span>");?>
        </h5>
      @else
        <h5>No se encontro nada de la busqueda: <?php echo "$buscar" ?></h5>
        @php
          $EstadoBusqueda = 0;
        @endphp
      @endif

    </div>
    <div class="filtroproductoCss">
      <h4>Opciones</h4>
      <hr>
      <br>
      <form>
        <select id="buscarcheck" multiple="multiple">
          <option value="" disabled selected>Marcas:</option>
          @if(isset($EstadoBusqueda))
            @if($EstadoBusqueda == 1)
              @foreach($nomprovee as $nomp)
                <option>{{ $nomp->nom }}</option>
              @endforeach
            @else
              <option disabled>Sin Opciones</option>
            @endif
          @endif

        </select>
      </form>
    </div>
    <div class="mostradorproductoCss">
      @php
        if(isset($productob->titulo)){

        }
      @endphp
      @if($EstadoBusqueda == 1)
        <table style="width:80%">
          <tr>
            <th>Titulo</th>
            <th>Datos</th>
          </tr>
          @if(isset($producto))

            @if($producto !=  null)
              @foreach($producto as $productob)
                <tr>
                  <td>{{ $productob->titulo }}</td>
                  <td>{{ $productob->datos }}</td>
                </tr>
              @endforeach
            @endif

          @else
            @if(isset($porMarca))
              @foreach($porMarca as $productob)
                <tr>
                  <td>{{ $productob->titulo }}</td>
                  <td>{{ $productob->datos }}</td>
                </tr>
              @endforeach
            @endif
          @endif
        </table>
      @else
        <h1>:/</h1>
        <ul>
          <li><h4>- Intenta colocando una marca ó</h4></li>
          <li><h4>- Nombres cortos de tu busqueda</h4></li>
        </ul>
      @endif

    </div>
  </div>
  @endsection