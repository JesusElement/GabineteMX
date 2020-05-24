<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Comprobante</title>
</head>
<body>

  <table width="100%">
    <tr>
        <td align="top"></td>
        <td align="right">
            <h3>GabienteMX SA.CV.</h3>
            <pre>
                Mexico
                5558923636
                Folio: {{$folio}}
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>De: </strong>República de Uruguay 13 Centro Histórico de la Cdad. de México, Centro Cuauhtémoc 06080 Hervidero y Plancha, CDMX</td>
    <td><strong>Para: </strong>{{$direccion}}</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th colspan="3">Producto</th>
      </tr>
    </thead>
    <tbody>
@php
    $pro = DB::select('SELECT a.cantidad, a.precio_uni, b.titulo FROM deta_comp as a, producto as b WHERE a.id_produc = b.id_produc  && a.id_pedido = ?', [$folio]); 
              foreach($pro as $value){
                $productos = $value->titulo." ".$value->cantidad." X ".$value->precio_uni;
                    echo"
                    <tr>
                    <td colspan='3'>$productos</td> 
                    </tr>
                    ";
              }
@endphp

    </tbody>
    <tfoot>
        <tr>

        <td align="right">$ {{$total}}</td>
        <td align="right">Transporte: {{$transporte}}</td>
        <td align="right">No.Rastreo: {{$ras}}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>