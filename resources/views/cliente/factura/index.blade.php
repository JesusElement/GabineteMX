<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Comprobante</title>
</head>

<body>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        
        table {
            font-size: 15px;
        }
        
        tfoot tr td {
            font-weight: bold;
            font-size: 13px;
        }
        
        .gray {
            background-color: lightgray
        }
        
        hr {
            border: 2px solid rgb(23, 177, 197);
        }
    </style>

    <table width="100%">
        <tr>
            <td align="top"></td>
            <td align="top">
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
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $pro = DB::select('SELECT a.cantidad, a.precio_uni, b.titulo FROM deta_comp as a, producto as b WHERE a.id_produc = b.id_produc && a.id_pedido = ?', [$folio]); foreach($pro as $value){ $productos = $value->titulo." ".$value->cantidad." X ".$value->precio_uni;
            @endphp
            <tr>
                <td> {{$value->titulo}}
                </td>
                <td> {{$value->cantidad}}
                    <hr>
                </td>
                <td> {{$value->precio_uni}}
                    <hr>
                </td>
            </tr>
            @php } @endphp

        </tbody>
        <tfoot>
            <tr>
                <td align="top">Transporte: {{$transporte}}</td>
                <td align="top">No.Rastreo: {{$ras}}</td>
                <th align="right">Total: $ {{$total}}</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>