@extends('layouts.plantilla')
@section('seccion')
<div class="contenido">
  <div class="Pedidos">
    <div class="marizq">

    </div>
    <div class="tituloP">
        <h3>Pedidos</h3>
        <hr>
    </div>
    <div class="tablaP">
        
      <table class="responsive-table highlight">
        <thead>
          <tr>
              <th>Name</th>
              <th>Item Name</th>
              <th>Item Price</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
          </tr>
        </tbody>
      </table>
        
    </div>
    <div class="marder">

    </div>
  </div>
</div>

@endsection